<?php namespace App\Http\Controllers\Admin;

use App\Ads;
use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdsRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


class ConfigController extends AdminController {

    public function getIndex()
    {
        return view('admin.config');
    }

    public function anyDatabase($operation)
    {
        $username = \Config::get('database.connections.mysql.username');
        $password = \Config::get('database.connections.mysql.password');
        $database = \Config::get('database.connections.mysql.database');

        if ($operation == 'dump') {
            exec('mysqldump  --opt --user='.$username.' --password='.$password.' --host=localhost '.$database.' > ../neuro.sql');
            $file= public_path(). "/../neuro.sql";
            return \Response::download($file, 'neuro.sql');
        } else if ($operation == 'import') {
            \Request::file('sql_file')->move('temp','temp.sql');
            exec('mysql --user='.$username.' --password='.$password.'  -e "create database if not exists '.$database.'"');
            exec('mysql --user='.$username.' --password='.$password.'  -e "drop database neuroscience" '.$database);
            exec('mysql --user='.$username.' --password='.$password.'  -e "create database if not exists '.$database.'"');
            exec('mysql --user='.$username.' --password='.$password.' '.$database.' < temp/temp.sql');
            unlink('temp/temp.sql');
            \Flash::info('Database imported !');
        }
        return redirect('admin/config');
    }

    public function getUpdate()
    {
        \Artisan::call('down');
        exec('git pull --rebase');
        exec('composer update -d=../');
        \Artisan::call('up');
        \Flash::info('Application has been updated !');
        return redirect('admin/config');
    }

    public function getCache($operation)
    {
        if ($operation == 'clear') {
            \Artisan::call('cache:clear');
            \Flash::info('App cache cleared !');
            return redirect('admin/config');
        } else if ($operation == 'route') {
            \Artisan::call('route:cache');
            return 'Route cached !';
        } else if ($operation == 'config') {
            \Artisan::call('config:clear');
            \Artisan::call('config:cache');
            return 'Config cached updated !';
        }
    }





}

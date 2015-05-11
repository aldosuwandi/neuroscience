@extends('app')

@section('content')

    <!-- Team Members Row -->
    <h3>Profile {{$doctor->name}}</h3>
    <hr/>
    <div class="row">
        <div class="col-sm-4">
            <img class="img-center" src="/uploads/{{$doctor->img_url}}" height="200" width="200">
        </div>
        <div class="col-sm-8">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td class="col-sm-4" style="background:#FCF5DD;">Nama</td>
                        <td>sfsfsfsfsaer</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4" style="background:#FCF5DD;">Title</td>
                        <td>sfsfsfsfsaer</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4" style="background:#FCF5DD;">Tempat, Tanggal Lahir</td>
                        <td>sfsfsfsfsaer</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4" style="background:#FCF5DD;">Institusi</td>
                        <td>sfsfsfsfsaer</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4" style="background:#FCF5DD;">Alamat</td>
                        <td>sfsfsfsfsaer</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4" style="background:#FCF5DD;">Telpon</td>
                        <td>sfsfsfsfsaer</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4" style="background:#FCF5DD;">Email</td>
                        <td>sfsfsfsfsaer</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr/>
    </div>

    <hr/>
    <h4>Education</h4>
    <?php echo $doctor->education; ?>
    <hr/>

    <h4>Experience</h4>
    <?php echo $doctor->experience; ?>
    <hr/>

    <h4>Organization</h4>
    <?php echo $doctor->organization; ?>
    <hr/>

    <h4>Training</h4>
    <?php echo $doctor->training; ?>
    <hr/>

    <h4>Publication</h4>
    <?php echo $doctor->publication; ?>
    <hr/>
@stop



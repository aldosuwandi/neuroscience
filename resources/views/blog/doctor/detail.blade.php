@extends('app')

@section('content')
    <!-- Team Members Row -->
    <h3>Profile {{$doctor->name}}</h3>
    <hr/>
    <div class="row">
        <div id="doctorPicture" class="col-sm-4" align="center">
            <img class="img-center img-responsive" src="{{url('/uploads/'.$doctor->img_url)}}">
        </div>
        <div class="col-sm-8">
            <table id="doctorTable" class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td class="col-sm-4">Nama</td>
                        <td>{{$doctor->name}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Title</td>
                        <td>{{$doctor->title}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Tempat, Tanggal Lahir</td>
                        <td>{{$doctor->birthday}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Institusi</td>
                        <td>{{$doctor->institution}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Alamat</td>
                        <td>{{$doctor->address}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Telpon</td>
                        <td>{{$doctor->phone}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Email</td>
                        <td>{{$doctor->email}}</td>
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



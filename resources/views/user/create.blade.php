@extends('user.master')
@section('title','จัดการฐานข้อมูล')
@section('content')
<style>  
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Kanit:wght@300&display=swap');
    body, h1, h2, h3, h4, h5, h6 {
        font-family: 'Kanit', sans-serif;
    }
</style>
<br>
<div class="container">
    <div class="col-md-12">
        <h3>เพิ่มข้อมูลผู้ใช้ระบบ</h3>
        
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

        <form method="post" action="{{ url('contact') }}"> <!-- user กำหนดจาก Route -->
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="ชื่อมิเตอร์" required>
        </div>
        <div class="form-group">
            <input type="text" name="meter" class="form-control" placeholder="ข้อมูล" required>
        </div>
        <button type="submit" class="btn btn-primary">บันทึก</button> 
        <a href="{{ url('contact') }}" class="btn btn-danger">ย้อนกลับ</a>

        </form>
    </div>
</div>
@endsection
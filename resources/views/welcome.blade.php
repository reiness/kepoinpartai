@extends('layouts.app')

@section('content')
<div style="background: #FF0000; height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div style="color: #fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
        <h1 style="font-size: 3rem; font-weight: bold;">Kepoin Partai</h1>
        <p style="font-size: 1.5rem; margin-bottom: 20px;">Yuk cari tau yang terbaik untuk 2024!</p>
        <a href="{{ route('register') }}" style="font-size: 1.2rem; padding: 10px 20px; text-decoration: none; background: #4CAF50; color: #fff; border: none; border-radius: 5px; transition: background-color 0.2s; display: inline-block;">Mulai Sekarang</a>
    </div>
</div>
@endsection

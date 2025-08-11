@extends('template')

@section('content')

<title>Dashboard Warga & Kategori</title>

<style>
  body {
    font-family: Arial, sans-serif;
    max-width: 900px;
    margin: 20px auto;
    padding: 0 20px;
  }
  .cards-container {
    display: flex;
    gap: 20px;
    flex-wrap: nowrap;
    overflow-x: auto;
  }
  .card {
    min-width: 200px;
    flex: 0 0 auto;
    color: white;
    padding: 20px;
    border-radius: 6px;
    box-sizing: border-box;
  }
  .yellow { background-color: #fbbf24; }
  .green { background-color: #16a34a; }
  .title {
    font-weight: bold;
    margin-bottom: 10px;
  }
  .value {
    font-size: 28px;
    font-weight: bold;
  }
</style>

<div class="cards-container">
  <div class="card yellow">
    <div class="title">Data Warga</div>

  </div>

  <div class="card green">
    <div class="title">Kategori Warga</div>

  </div>

  

 
</div>

@endsection

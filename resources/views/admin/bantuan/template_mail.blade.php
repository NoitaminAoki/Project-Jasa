<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Balasan Dari Customer Service E-Bina</title>
    <style media="screen">
      * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        list-style-type: none;
        outline: none;
        scroll-behavior: smooth;
        text-decoration: none;
      }
      body {
        background-color: #f6f6f6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
        flex-wrap: wrap;
        position: relative;
      }
      main {
        width: 90%;
      }
      footer {
        bottom: 0;
        height: 60px;
        color: #616161;
        font-size: 18px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #b3b3b3;
        position: absolute;
        width: 100%;
        padding: 0 5%;
      }
      #heading-text {
        display: flex;
        position: relative;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 40px;
        padding-top: 40px;
        justify-content: space-between;
      }
      #heading-text h2 {
        color: #8e8e8e;
        top: 0;
        text-transform: uppercase;
        position: absolute;
        font-size: 20px;
        height: 20px;
        width: 100%;
        margin-bottom: 20px;
      }
      #heading-text h1 {
        font-size: 25px;
        color: #323232;
        text-transform: capitalize;
      }
      #body-email {
        color: #373737;
      }
    </style>
  </head>
  <body>
    <main>
      <div id="heading-text">
        <h2>From E-Bina Customer Service</h2>
        <h1>Balasan Untuk Pertanyaanmu Tentang {{ $subject }}</h1>
        <img src="{{ $message->embed("assets/img/e-bina.jpeg") }}" height="60">
      </div>
      {{-- {{ $balasan }} --}}
      <div id="body-email">
        {{ $balasan }}
      </div>
    </main>
    <footer>
      <small>&copy; PT Jaya Bina Konsultan Grup {{ date("Y") }}</small>
      <small>Dikirim pada <time>{{ date('d F Y') }}</time></small>
    </footer>
  </body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sedekah Listrik Masjid</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
      @import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");

      footer {
        width:100vw;
        position:relative;
        bottom:-5rem;
        top:auto;
      }
      footer div {
        background-color:#0275d8;
        margin: -45px 0px 0px 0px;
        padding:0px;
        color: #fff;
        text-align:center;
      }
      svg {
        width:100%;
      }
      .arrow {
        stroke-width: .3px;
        stroke:yellow;
      }
      .topball {
        animation: ball 1.5s ease-in-out;
        animation-iteration-count:infinite;
        animation-direction: alternate;
        animation-delay: 0.3s;
        cursor:pointer;
      }

      .wave {
        animation: wave 3s linear;
        animation-iteration-count:infinite;
        fill: #0275d8;
      }
      .drop {
        fill: transparent;
        animation: drop 5s ease infinite normal;
        stroke: #0275d8;
        stroke-width:0.5;
        opacity:.6; 
        transform: translateY(80%);
      }
      .drop1 {
        transform-origin: 20px 3px;
      }
      .drop2 {
        animation-delay: 3s;
        animation-duration:3s;
        transform-origin: 25px 3px;
      }
      .drop3 {
        animation-delay: -2s;
        animation-duration:3.4s;
        transform-origin: 16px 3px;
      }
      .gooeff {
          filter: url(#goo);
      }
      #wave2 {
        animation-duration:5s;
        animation-direction: reverse;
        opacity: .6
      }
      #wave3 {
        animation-duration: 7s;
        opacity:.3;
      }
      @keyframes drop {
        0% {
          transform: translateY(80%); 
          opacity:.6; 
        }
        80% {
          transform: translateY(80%); 
          opacity:.6; 
        }
        90% { 
          transform: translateY(10%) ; 
          opacity:.6; 
        }
        100% { 
          transform: translateY(0%) scale(1.5);  
          stroke-width:0.2;
          opacity:0; 
        }
      }
      @keyframes wave {
        to {transform: translateX(-100%);}
      }
      @keyframes ball {
        to {transform: translateY(20%);}
      }


    </style>
    <nav class="navbar navbar-expand-lg bg-primary p-4 navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="fa fa-bolt"></i> Sedekah Listrik Masjid</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </head>
  <body>
    @yield('content')
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="keyword" content="">
<link rel="icon" href="assets/favicon.png" type="image/x-icon">
<title>Hopeful</title>


<link rel="stylesheet" href="assets/css/luno-style.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<script src="assets/js/plugins.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<style>
  * {
    letter-spacing: .5px;
  }

  @font-face {
    font-family: Sora-Bold;
    src: url(assets/fonts/Sora-Bold.ttf);
    font-weight: 800;
  }

  @font-face {
    font-family: Sora-ExtraBold;
    src: url(assets/fonts/Sora-ExtraBold.ttf);
    font-weight: bold;
  }

  @font-face {
    font-family: Sora-ExtraLight;
    src: url(assets/fonts/Sora-ExtraLight.ttf);
    font-weight: 100;
  }

  @font-face {
    font-family: Sora-Light;
    src: url(assets/fonts/Sora-Light.ttf);
    font-weight: 200;
  }

  @font-face {
    font-family: Sora-Regular;
    src: url(assets/fonts/Sora-Regular.ttf);

  }

  @font-face {
    font-family: Sora-SemiBold;
    src: url(assets/fonts/Sora-SemiBold.ttf);
    font-weight: 400;
  }

  @font-face {
    font-family: Sora-Thin;
    src: url(assets/fonts/Sora-Thin.ttf);
    font-weight: 500;
  }

  .Sora-SemiBold {
    font-family: Sora-SemiBold;
  }
  .Sora-Regular {
    font-family:Sora-Regular;
    /* font-weight: 900; */
  }

  .items {
    font-family: Sora-SemiBold;
  }

  h4,
  h1,
  h3 {
    color: #313132;
    font-family: Sora-SemiBold;
  }

  h1 {
    font-size: 50px;
  }

  tr>th {
    color: #817a72 !important;
    font-family: Sora-SemiBold;
    text-transform: capitalize !important;
    font-size: 15px !important;
    padding: 15px !important;
  }

  tr>td {
    color: #313132 !important;
    font-family: Sora-SemiBold;
    text-transform: lowercase !important;
    font-size: 15px !important;
    padding: 15px !important;
  }

  p,
  li>a {
    font-family: Sora-Regular;
  }

  .btn {
    color: #313132;
    font-family: Sora-Regular;
  }

  .text-success2 {
    color: #7ed957;
  }

  .text-danger2 {
    color: #d89459!important;
  }

  .bg-new {
    background-color: transparent;
    border: 2px solid #d1a577;

    padding-top: 12px !important;

  }

  .mt-20 {
    margin-top: 20px;
  }

  .mt-30 {
    margin-top: 30px;
  }

  .mb-30 {
    margin-bottom: 30px;
  }

  .mb-20 {
    margin-bottom: 20px;
  }

  .mt-50 {
    margin-top: 50px !important;
  }

  .mt-60 {
    margin-top: 60px !important;
  }

  .mb-50 {
    margin-bottom: 50px !important;
  }

  .mb-60 {
    margin-bottom: 60px !important;
  }

  .p-40 {
    padding: 40px;
  }

  .p-60 {
    padding: 60px;
  }

  .radius-30 {
    border-radius: 25px;
  }

  .radius-25 {
    border-radius: 25px;
  }

  .cardWidth {
    width: 40%;
  }

  .btn-dark2 {
    background-color: #fcf2e7;
    border: 0px;
  }

  .btn-dark2:hover,
  .btn-dark2:focus,
  .btn-dark2:active {
    background-color: #fcf2e7;
    border: 0px;
  }

  input[type=password] {
    font-family: Arial;
  }

  .placeholder-sora {
    padding: 20px;
  }

  .placeholder-sora::placeholder {
    font-family: Sora-SemiBold;
  }

  .loader {
    position: absolute;
    z-index: 9999;
    width: 100%;
    height: 99vh;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;

  }

  .container-90 {
    width: 90vw;
  }

  .pointer {
    cursor: pointer;
  }

  .text-danger2 {
    color: #ff5757;
  }

  .text-success2 {
    color: #7ed957;
  }

  .data {
    box-shadow: 0px 2px 15px 2px #EADED3!important;
    border-radius: 10px;
    align-items: center;
    display: flex;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    color:  #E39C5F;
    background-color: #fff;
  }
  .data1 {
    box-shadow: 0px 2px 15px 2px #EADED3!important;
    border-radius: 10px;
    align-items: center;
    display: flex;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    background-color: #E39C5F;
  }
  
  .data  img {
    /* background-color: red; */
  }
  .data:hover img {
    filter: brightness(0) invert(1);
  }
  .data:hover {
    background-color: #E39C5F;
    color: #fff;
  }
  
 
.accordion-button.collapsed{
  color: #fff;
} 
.accordion-button:not(.collapsed)::after{
  background:url('assets/images/after.png') no-repeat;
  background-size: 100%;
} 
.accordion-button.collapsed::after {
  background:url('assets/images/after.png') no-repeat;
  background-size: 100%;
}
.custom-accordion-item {
  box-shadow: 0px 2px 15px 2px #EADED3!important;
  
}

  @media only screen and (max-width: 600px) {
    .cardWidth {
      width: 90%;
    }

    .container-90 {
      width: 99vw;
    }

    .p-60 {
      padding: 10px;
    }
  }
</style>

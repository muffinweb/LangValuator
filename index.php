<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Multilanguage ValueTranslator</title>
  <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <style type="text/css">
    .navbar-item img{
      max-height: 5.75rem;
    }
  </style>

  <style>
    nav.navbar {
      height: 6rem !important;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06) !important;
    }
  </style>
</head>

<body>
  <!-- START NAV -->
  <nav class="navbar">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="/">
          <img src="media/logo.png" alt="Logo">
        </a>
        <span class="navbar-burger burger" data-target="navbarMenu">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </div>
      <div id="navbarMenu" class="navbar-menu">
        <div class="navbar-end">
          <div class=" navbar-item">
            <div class="control has-icons-left">
              <input class="input is-rounded" type="email" placeholder="Arama">
              <span class="icon is-left">
                <i class="fa fa-search"></i>
              </span>
            </div>
          </div>
          <a class="navbar-item is-active is-size-5 has-text-weight-semibold">
            @Ornek
          </a>
          <a class="navbar-item is-size-5 has-text-weight-semibold">
            Ayarlar
          </a>
          <a class="navbar-item is-size-5 has-text-weight-semibold">
            Çıkış
          </a>
        </div>
      </div>
    </div>
  </nav>
  <!-- END NAV -->

  <!-- Image -->
  <section class="hero ">
    <div class="hero-body">
      <div class="container">

        <section class="section">
          <div class="columns">
            <div class="column is-8 is-offset-2">
              <div class="content is-medium">
                <h2 class="subtitle is-6">Anahtar değerleri Türkçe diline çevirmek istediğiniz PHP Array dizinini buraya giriniz..</h2>
                <form>
                  <img id="loader" src="/media/preview.gif" style="display:none;position:absolute;z-index:9;top:-11px;left:0;right:0;bottom:0;margin: auto;height:518px;width:64%;">
                  <textarea style="height:500px;" id="translateval" class="textarea" placeholder="(Example) [['Orders' => ['order' => 'I want to be translated'], 'Main' => 'I want too']]"></textarea>
                </form>
                <br>
                <button style="width:100%" class="convertBtn button is-link">Dönüştür</button>
              </div>
            </div>
          </div>
        </section>



      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <strong>Multilanguage ValueTranslator</strong> by <a href="https://ugurcengiz.com">Ugur Cengiz</a>
      </p>
    </div>
  </footer>

  <div class="modal">
    <div class="modal-background"></div>
    <pre style="color:black;font-size:14px;font-weight: bold;" class="modal-content">
      return [
          'invalid_vat_format' => 'The given vat id has a wrong format',
          'security-warning' => 'Suspicious activity found!!!',
          'nothing-to-delete' => 'Nothing to delete',

          'layouts' => [
              'my-account' => 'My Account',
              'profile' => 'Profile',
              'address' => 'Address',
              'reviews' => 'Reviews',
              'wishlist' => 'Wishlist',
              'orders' => 'Orders',
              'downloadable-products' => 'Downloadable Products'
          ],

          'common' => [
              'error' => 'Something went wrong, please try again later.',
              'no-result-found' => 'We could not find any records.'
          ]
      ]
    </pre>
    <button class="modal-close is-large" aria-label="close"></button>
  </div>

<script type="text/javascript" src="/assets/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    function showLoading(){
      $('#loader').show();
    }

    function hideLoading(){
      $('#loader').hide();
    }

    $('.modal-close').click(function(){
      $('.modal').removeClass('is-active');
    });

    $('#navbarMenu > div > a.navbar-item.is-active.is-size-5.has-text-weight-semibold').click(function(){
      $('.modal').addClass('is-active');
    })



    $('.convertBtn').click(function(){
      var value = $('#translateval').val();
      $.ajax({
        url: '/translate.php',
        method: 'POST',
        data:{
          translateRequest:value
        },
        beforeSend: function(){
          showLoading();
        },
        success: function(response){
          $('#translateval').val(response);
          hideLoading();
        }
      })
    })
  })
</script>
</body>

</html>
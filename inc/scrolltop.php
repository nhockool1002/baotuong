<script>
  // kéo xuống khoảng cách 600px thì xuất hiện nút Top-up
  var offset = 100;

  // thời gian di trượt 0.95s ( 1000 = 1s )
  var duration = 950;
  $(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > offset) $('#top-up').fadeIn(duration);
        else $('#top-up').fadeOut(duration);
        });
        $('#top-up').click(function () {
          $('body,html').animate({scrollTop: 0}, duration);
          });
        });
</script>

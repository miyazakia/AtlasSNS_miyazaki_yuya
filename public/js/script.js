// $(function () { // if document is ready
//   alert('hello world')
// });
$(function () {
  $(".nav-btn").on("click", function () {
    $(this).next().slideToggle(300);
    $(this).toggleClass("open", 300);
  });
});

//投稿編集

$('.js-modal-open').on('click', function () {
  var post_id = $(this).attr('post_id');
  var post = $(this).attr('post');
  console.log(post_id);
  $('.modal_post').text(post);
  $('.modal_id').val(post_id);
  $('.js-modal').fadeIn();
  return false;
});

$('.js-modal-close').on('click', function () {
  $('.js-modal').fadeOut();
  return false;
});

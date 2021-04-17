<?php
session_start();
/* Template Name: front-page */
?>
<?php get_header(); ?>
<div class="container front-page">
  <div class="row justify-content-center">
    <div class="p-5 mt-5">
      <a href="<?php echo get_permalink(get_page_by_title('contact')); ?>" class="btn btn-primary">お申し込みへ</a>
    </div>
  </div>
</div>
<?php get_footer(); ?>
<?php ob_start(); include("../_includes/op_codex.php"); //Framework ?>
<?php open_header(); ?>
<script language="javascript" src="<?php echo $global_url; ?>/_scripts/functions.js" type="text/javascript"></script>
<?php close_header(); ?>

<?php 
session_delete("admin_logon",$global_url);

header("location:../acesso");
?>

<?php get_footer(); ob_end_flush(); ?>
<?php
/**
 * Email Header
 *
 * @author 		Easy Digital Downloads
 * @package 	Easy Digital Downloads/Templates/Emails
 * @version     2.1
 */

 // Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline. !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
$body = "
	background-color: #f5f5f2;
	font-family: 'Avenir', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
";
$wrapper = "
	width:100%;
	-webkit-text-size-adjust:none !important;
	margin:0;
	padding: 70px 0 70px 0;
";
$template_container = "
	box-shadow:0 0 0 1px #eee !important;
	border-radius:4px !important;
	background-color: #ffffff;
	border-radius:4px !important;
";
$template_header = "
	color: #00000;
	border-top-left-radius:4px !important;
	border-top-right-radius:4px !important;
	border-bottom: 0;
	font-weight:bold;
	line-height:100%;
	text-align: center;
	vertical-align:middle;
";
$body_content = "
	border-radius:4px !important;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
	padding-bottom: 20px;
";
$body_content_inner = "
	color: #121212;
	font-size:16px;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
	line-height:150%;
	text-align:left;
";
$header_content_h1 = "
	color: #121212;
	margin:0;
	padding:20px 20px 0;
	display:block;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
	font-size:32px;
	font-weight: 500;
	line-height: 1.2;
";
$header_img = edd_get_option( 'email_logo', '' );
$heading    = EDD()->emails->get_heading();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo get_bloginfo( 'name' ); ?></title>
		<style>a { color: #f73a11 !important; } h3 { font-weight: 500; }</style>
	</head>
	<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="<?php echo $body; ?>">
		<div style="<?php echo $wrapper; ?>">
		<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
			<tr>
				<td align="center" valign="top">
					<?php if( ! empty( $header_img ) ) : ?>
						<div id="template_header_image">
							<?php echo '<p style="margin-top:0;margin-bottom:30px;"><a href=""'. esc_url( home_url() ) . '" target="_blank"><img src="' . esc_url( $header_img ) . '" alt="' . get_bloginfo( 'name' ) . '" /></a></p>'; ?>
						</div>
					<?php endif; ?>
					<table border="0" cellpadding="0" cellspacing="0" width="560" id="template_container" style="<?php echo $template_container; ?>">
						<?php if ( ! empty ( $heading ) ) : ?>
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="560" id="template_header" style="<?php echo $template_header; ?>" bgcolor="#ffffff">
										<tr>
											<td>
												<h1 style="<?php echo $header_content_h1; ?>"><?php echo $heading; ?></h1>
											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
						<?php endif; ?>
						<tr>
							<td align="center" valign="top">
								<!-- Body -->
								<table border="0" cellpadding="0" cellspacing="0" width="560" id="template_body">
									<tr>
										<td valign="top" style="<?php echo $body_content; ?>">
											<!-- Content -->
											<table border="0" cellpadding="20" cellspacing="0" width="100%">
												<tr>
													<td valign="top">
														<div style="<?php echo $body_content_inner; ?>">

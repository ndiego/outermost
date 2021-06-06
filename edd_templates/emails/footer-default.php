<?php
/**
 * Email Footer
 *
 * @author 		Easy Digital Downloads
 * @package 	Easy Digital Downloads/Templates/Emails
 * @version     2.1
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline.
$template_footer = "
	background-color: #121212;
	border-top:0;
	border-bottom-right-radius:4px;
	border-bottom-left-radius:4px;
	border-top: 1px solid black;
";

$credit = "
	border:0;
	color: #959595;
	font-family: 'Avenir', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
	font-size:12px;
	line-height:125%;
	text-align:center;
	padding: 20px 0;
";
?>
															</div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Footer -->
                                    <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer" style="<?php echo $template_footer; ?>">
                                        <tr>
                                            <td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
														<td colspan="2" valign="middle" id="credit" style="<?php echo $credit; ?>">
                                                        	<a href="<?php echo esc_url( home_url() ); ?>" style="color:#959595 !important;"><?php echo get_bloginfo( 'name' ); ?></a> is a product of Outermost, LLC &nbsp;&middot;&nbsp;  <a href="mailto:support@blockvisibilitywp.com" style="color:#959595 !important;">Contact Support</a> &nbsp;&middot;&nbsp; <a href="https://www.blockvisibilitywp.com/terms" target="_blank" style="color:#959595 !important;">Terms of Service</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>

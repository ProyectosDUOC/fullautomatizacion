<?php

       
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/POP3.php';
require '../PHPMailer/SMTP.php';
require '../PHPMailer/Exception.php';

class CorreoEnviar{
    public static  function mensaje($nombre, $mensaje){   
        $hoy = date("d-m-Y");
        $hora = date("H:i:s");    
        
        $mensaje ="<div style='margin:0;padding:0' dir='ltr' bgcolor='#fff'>
	<table border='0' cellspacing='0' cellpadding='0' align='center' id='m_-6178248814634677741email_table' style='border-collapse:collapse'>
		<tbody>
			<tr>
				<td id='m_-6178248814634677741email_content' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff'>
					<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
						<tbody>
							<tr>
								<td height='20' style='line-height:20px' colspan='3'>&nbsp;</td>
							</tr>
							<tr>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
								<td>
									<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
										<tbody>
											<tr>
												<td height='16' style='line-height:16px' colspan='3'>&nbsp;</td>
											</tr>
											<tr>
												<td width='32' align='left' valign='middle' style='height:32;line-height:0px'>
													<a href='https://image.ibb.co/bNO4YV/monitoreo.jpg' style='color:#3b5998;text-decoration:none' target='_blank'
													 data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/n/?login_alerts%252Fstart%252F%26fbid%3D2417720035130744%26s%3De%26aref%3D1536968647297661%26medium%3Demail%26mid%3D575dd1caac7abG5af4a4c8a259G575dd6640ca7dG2bf%26bcode%3D2.1536968647.AbyI8cfZ5aoshQSknL4%26n_m%3Dbenja.mora.torres%2540gmail.com&amp;source=gmail&amp;ust=1541510942303000&amp;usg=AFQjCNFqkjLtlGbWUDKlVBmU0b876rz91Q'><img
														 src='https://image.ibb.co/bNO4YV/monitoreo.jpg' width=52 height='52' style='border:0' class='CToWUd'>
													</a>
												</td>
												<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
												<td width='100%'><a href='#' style='color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px'
													 target='_blank' data-saferedirecturl=''></a><strong>Full Automatización</strong> - Vides</a></td>
											</tr>
											<tr style='border-bottom:solid 1px #e5e5e5'>
												<td height='16' style='line-height:16px' colspan='3'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
								<td>
									<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
										<tbody>
											<tr>
												<td height='28' style='line-height:28px'>&nbsp;</td>
											</tr>
											<tr>
												<td><span class='m_-6178248814634677741mb_text' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;font-weight:bold;color:#141823'>Hola,
														". $nombre . ":</span></td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
                                                <td><span class='m_-6178248814634677741mb_text' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823'>
                                                ". $mensaje ."
                                                
                                                </span></td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr style='border-top:solid 1px #e5e5e5'>
												<td height='0' style='line-height:0px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td>
													<table border='0' width='100%' cellspacing='0' cellpadding='0' align='left' class='m_-6178248814634677741ib_t'
													 style='border-collapse:collapse;min-width:420px'>
														<tbody>
															<tr class='m_-6178248814634677741ib_row'>
																<td valign='top' style='padding-right:10px;font-size:0px' class='m_-6178248814634677741ib_img'><img src='https://ci3.googleusercontent.com/proxy/ZaPj3Y8P2gyDIt5UXCVFWA91HakHSwc3qGPcCkJWoI2WCIm-RoMc--6yBrmL02GhEkQmaYlfyls1G_9N1A2qg-mYvFYrmxbtnssEXbh25g=s0-d-e1-ft#https://static.xx.fbcdn.net/rsrc.php/v3/yh/r/LfAMKrcElXp.png'
																	 width='16px' height='16px' style='border:0' class='CToWUd'></td>
																<td width='100%' valign='top' style='padding-right:10px' class='m_-6178248814634677741ib_mid'><span
																	 class='m_-6178248814634677741mb_text' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823'>". $hoy ." a las " . $hora ."</span></td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr style='border-top:solid 1px #e5e5e5'>
												<td height='0' style='line-height:0px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td>
													<table border='0' width='100%' cellspacing='0' cellpadding='0' align='left' class='m_-6178248814634677741ib_t'
													 style='border-collapse:collapse;min-width:420px'>
														<tbody>
															<tr class='m_-6178248814634677741ib_row'>
																<td valign='top' style='padding-right:10px;font-size:0px' class='m_-6178248814634677741ib_img'>
																	<img src='https://ci5.googleusercontent.com/proxy/F6f-NFBkYsGdcKw54OnBeuIDenzqIghlXKoPbId0hCjUoYUz65D1hxME3Ub_bnS_uox0yNcx5J1aFPD00PC-PCbPDipHDs-bwYfn5mpDmA=s0-d-e1-ft#https://static.xx.fbcdn.net/rsrc.php/v3/yn/r/HLjP6-RaBz8.png'
																	 width='16px' height='16px' style='border:0' class='CToWUd'></td>
																<td width='100%' valign='top' style='padding-right:10px' class='m_-6178248814634677741ib_mid'><span
																	 class='m_-6178248814634677741mb_text' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823'>Cerca
																		de Santiago, Chile</span></td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr style='border-top:solid 1px #e5e5e5'>
												<td height='0' style='line-height:0px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
								<td>
									<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
										<tbody>
											<tr>
												<td height='2' style='line-height:2px' colspan='3'>&nbsp;</td>
											</tr>
											<tr>
												<td width='10' style='display:block;width:10px' class='m_-6178248814634677741mb_hide'>&nbsp;&nbsp;&nbsp;</td>
												<td class='m_-6178248814634677741mb_blk'><a href='https://www.facebook.com/n/?login_alerts%2Fsettings%2F&amp;aref=1536968647297661&amp;medium=email&amp;mid=575dd1caac7abG5af4a4c8a259G575dd6640ca7dG2bf&amp;bcode=2.1536968647.AbyI8cfZ5aoshQSknL4&amp;n_m=benja.mora.torres%40gmail.com'
													 style='color:#3b5998;text-decoration:none' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/n/?login_alerts%252Fsettings%252F%26aref%3D1536968647297661%26medium%3Demail%26mid%3D575dd1caac7abG5af4a4c8a259G575dd6640ca7dG2bf%26bcode%3D2.1536968647.AbyI8cfZ5aoshQSknL4%26n_m%3Dbenja.mora.torres%2540gmail.com&amp;source=gmail&amp;ust=1541510942304000&amp;usg=AFQjCNEErWdRcViksVLPczGM_rDJ5TsX4Q'>
														<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
															<tbody>
																<tr>
																	<td style='border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:solid 1px #c9ccd1;background:#f6f7f8;padding:7px 16px 11px 16px'><a
																		 href='http://www.fullautomatizacion.cl/' style='color:#3b5998;text-decoration:none;display:block'
																		 target='_blank' data-saferedirecturl='http://www.fullautomatizacion.cl/'>
																			<center>
																				<font size='3'><span style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#525252;font-size:14px;line-height:14px'>Ir al sitio</span></font>
																			</center>
																		</a></td>
																</tr>
															</tbody>
														</table>
													</a></td>
												<td width='100%' class='m_-6178248814634677741mb_hide'></td>
											</tr>
											<tr>
												<td height='32' style='line-height:32px' colspan='3'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
								<td>
									<table border='0' width='100%' cellspacing='0' cellpadding='0' align='left' style='border-collapse:collapse'>
										<tbody>
											<tr style='border-top:solid 1px #e5e5e5'>
												<td height='16' style='line-height:16px'>&nbsp;</td>
											</tr>
											<tr>
												<td style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:11px;color:#aaaaaa;line-height:16px'>
													
													<br>Fullautomatizacion, 2018. 
												</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td height='20' style='line-height:20px' colspan='3'>&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>";
        
        
        return $mensaje;
	}
	
	public static  function mensaje2($nombre, $mensaje){   
        $hoy = date("d-m-Y");
        $hora = date("H:i:s");    
        
        $mensaje ="<div style='margin:0;padding:0' dir='ltr' bgcolor='#fff'>
	<table border='0' cellspacing='0' cellpadding='0' align='center' id='m_-6178248814634677741email_table' style='border-collapse:collapse'>
		<tbody>
			<tr>
				<td id='m_-6178248814634677741email_content' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff'>
					<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
						<tbody>
							<tr>
								<td height='20' style='line-height:20px' colspan='3'>&nbsp;</td>
							</tr>
							<tr>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
								<td>
									<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
										<tbody>
											<tr>
												<td height='16' style='line-height:16px' colspan='3'>&nbsp;</td>
											</tr>
											<tr>
												<td width='32' align='left' valign='middle' style='height:32;line-height:0px'>
													<a href='https://image.ibb.co/keyf7q/descarga.jpg' style='color:#3b5998;text-decoration:none' target='_blank'
													 data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/n/?login_alerts%252Fstart%252F%26fbid%3D2417720035130744%26s%3De%26aref%3D1536968647297661%26medium%3Demail%26mid%3D575dd1caac7abG5af4a4c8a259G575dd6640ca7dG2bf%26bcode%3D2.1536968647.AbyI8cfZ5aoshQSknL4%26n_m%3Dbenja.mora.torres%2540gmail.com&amp;source=gmail&amp;ust=1541510942303000&amp;usg=AFQjCNFqkjLtlGbWUDKlVBmU0b876rz91Q'><img
														 src='https://image.ibb.co/keyf7q/descarga.jpg' width=82 height='82' style='border:0' class='CToWUd'>
													</a>
												</td>
												<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
												<td width='100%'><a href='#' style='color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px'
													 target='_blank' data-saferedirecturl=''></a><strong>Full Automatización</strong> - Ganaderia</a></td>
											</tr>
											<tr style='border-bottom:solid 1px #e5e5e5'>
												<td height='16' style='line-height:16px' colspan='3'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
								<td>
									<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
										<tbody>
											<tr>
												<td height='28' style='line-height:28px'>&nbsp;</td>
											</tr>
											<tr>
												<td><span class='m_-6178248814634677741mb_text' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;font-weight:bold;color:#141823'>Hola,
														". $nombre . ":</span></td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
                                                <td><span class='m_-6178248814634677741mb_text' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823'>
                                                ". $mensaje ."
                                                
                                                </span></td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr style='border-top:solid 1px #e5e5e5'>
												<td height='0' style='line-height:0px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td>
													<table border='0' width='100%' cellspacing='0' cellpadding='0' align='left' class='m_-6178248814634677741ib_t'
													 style='border-collapse:collapse;min-width:420px'>
														<tbody>
															<tr class='m_-6178248814634677741ib_row'>
																<td valign='top' style='padding-right:10px;font-size:0px' class='m_-6178248814634677741ib_img'><img src='https://ci3.googleusercontent.com/proxy/ZaPj3Y8P2gyDIt5UXCVFWA91HakHSwc3qGPcCkJWoI2WCIm-RoMc--6yBrmL02GhEkQmaYlfyls1G_9N1A2qg-mYvFYrmxbtnssEXbh25g=s0-d-e1-ft#https://static.xx.fbcdn.net/rsrc.php/v3/yh/r/LfAMKrcElXp.png'
																	 width='16px' height='16px' style='border:0' class='CToWUd'></td>
																<td width='100%' valign='top' style='padding-right:10px' class='m_-6178248814634677741ib_mid'><span
																	 class='m_-6178248814634677741mb_text' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823'>". $hoy ." a las " . $hora ."</span></td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr style='border-top:solid 1px #e5e5e5'>
												<td height='0' style='line-height:0px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td>
													<table border='0' width='100%' cellspacing='0' cellpadding='0' align='left' class='m_-6178248814634677741ib_t'
													 style='border-collapse:collapse;min-width:420px'>
														<tbody>
															<tr class='m_-6178248814634677741ib_row'>
																<td valign='top' style='padding-right:10px;font-size:0px' class='m_-6178248814634677741ib_img'>
																	<img src='https://ci5.googleusercontent.com/proxy/F6f-NFBkYsGdcKw54OnBeuIDenzqIghlXKoPbId0hCjUoYUz65D1hxME3Ub_bnS_uox0yNcx5J1aFPD00PC-PCbPDipHDs-bwYfn5mpDmA=s0-d-e1-ft#https://static.xx.fbcdn.net/rsrc.php/v3/yn/r/HLjP6-RaBz8.png'
																	 width='16px' height='16px' style='border:0' class='CToWUd'></td>
																<td width='100%' valign='top' style='padding-right:10px' class='m_-6178248814634677741ib_mid'><span
																	 class='m_-6178248814634677741mb_text' style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823'>Cerca
																		de Santiago, Chile</span></td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr style='border-top:solid 1px #e5e5e5'>
												<td height='0' style='line-height:0px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
											<tr>
												<td height='14' style='line-height:14px'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
								<td>
									<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
										<tbody>
											<tr>
												<td height='2' style='line-height:2px' colspan='3'>&nbsp;</td>
											</tr>
											<tr>
												<td width='10' style='display:block;width:10px' class='m_-6178248814634677741mb_hide'>&nbsp;&nbsp;&nbsp;</td>
												<td class='m_-6178248814634677741mb_blk'><a href='https://www.facebook.com/n/?login_alerts%2Fsettings%2F&amp;aref=1536968647297661&amp;medium=email&amp;mid=575dd1caac7abG5af4a4c8a259G575dd6640ca7dG2bf&amp;bcode=2.1536968647.AbyI8cfZ5aoshQSknL4&amp;n_m=benja.mora.torres%40gmail.com'
													 style='color:#3b5998;text-decoration:none' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/n/?login_alerts%252Fsettings%252F%26aref%3D1536968647297661%26medium%3Demail%26mid%3D575dd1caac7abG5af4a4c8a259G575dd6640ca7dG2bf%26bcode%3D2.1536968647.AbyI8cfZ5aoshQSknL4%26n_m%3Dbenja.mora.torres%2540gmail.com&amp;source=gmail&amp;ust=1541510942304000&amp;usg=AFQjCNEErWdRcViksVLPczGM_rDJ5TsX4Q'>
														<table border='0' width='100%' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
															<tbody>
																<tr>
																	<td style='border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:solid 1px #c9ccd1;background:#f6f7f8;padding:7px 16px 11px 16px'><a
																		 href='http://www.fullautomatizacion.cl/' style='color:#3b5998;text-decoration:none;display:block'
																		 target='_blank' data-saferedirecturl='http://www.fullautomatizacion.cl/'>
																			<center>
																				<font size='3'><span style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#525252;font-size:14px;line-height:14px'>Ir al sitio</span></font>
																			</center>
																		</a></td>
																</tr>
															</tbody>
														</table>
													</a></td>
												<td width='100%' class='m_-6178248814634677741mb_hide'></td>
											</tr>
											<tr>
												<td height='32' style='line-height:32px' colspan='3'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
								<td>
									<table border='0' width='100%' cellspacing='0' cellpadding='0' align='left' style='border-collapse:collapse'>
										<tbody>
											<tr style='border-top:solid 1px #e5e5e5'>
												<td height='16' style='line-height:16px'>&nbsp;</td>
											</tr>
											<tr>
												<td style='font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:11px;color:#aaaaaa;line-height:16px'>
													
													<br>Fullautomatizacion, 2018. 
												</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width='15' style='display:block;width:15px'>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td height='20' style='line-height:20px' colspan='3'>&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>";
        
        
        return $mensaje;
	}

	public static function Enviar($correo, $asunto, $mensaje ){
		
		$mail = new PHPMailer(true);
        try {
            
            $mail->isSMTP(); // Set mailer to use SMTP xd
            $mail->CharSet = "UTF-8";
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'webscontactos@gmail.com'; // SMTP username
            $mail->Password = 'abcd14abcd'; // SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->IsHTML(true); // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to

            $mail->setFrom('webscontactos@gmail.com', 'Contacto Web Full Automatizacion');       

            $mail->addAddress($correo);
            
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;
        } catch (Exception $e) {			
			echo '<script type="text/javascript">
			alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . ');
			window.location="../index.html"
			</script>';     
        }
       
        if ($mail->Send()) {
                    return true;
        } else {
                   return false;       
       
            }
	}
	
}

?>
<?php
	//csrf token
	session_start();

	$csrfField = 'csrf-token';
	$csrfToken = $_SESSION[$csrfField];

	if(empty($csrfToken)) {
		if(function_exists('mcrypt_create_iv'))
			$csrfToken = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		else
			$csrfToken = bin2hex(openssl_random_pseudo_bytes(32));

		$_SESSION[$csrfField] = $csrfToken;
	}
?>

<!doctype HTML>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- SEO -->
		<meta name="description" content="Comprehensive security for your business - now only $14 per license.">
		<meta name="google-site-verification" content="yDpaEMhJ0S1kliXWHBxv0N-uGhfngwyNA90j1eq5qts" />
		<meta name="msvalidate.01" content="4DF06806CC9FD35541BDAA5FE16F0277" />

		<!-- css -->
		<link rel="stylesheet" href="assets/css/normalize.css">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/media.css">

		<link href="https://fonts.googleapis.com/css?family=Montserrat:700|Source+Sans+Pro:400,700" rel="stylesheet">

		<title>McAfee Small Business Security</title>

		<!-- structured data -->
		<script type="application/ld+json">
			{
			  "@context": "http://schema.org",
			  "@type": "Product",
			  "description": "McAfee Small Business Security protects the devices that you use for your business so your customer data and sensitive information is safeguarded from hackers and criminals.",
			  "name": "McAfee Small Business Security - Single License",
			  "offers": {
			    "@type": "Offer",
			    "availability": "http://schema.org/InStock",
			    "price": "14.00",
			    "priceCurrency": "USD"
			  }
			}
		</script>
	</head>

	<body>
		<header>
			<div class="content">
				<a href="/"><img src="assets/img/logo.png" alt="Allen Corporation of America Inc."></a>
			</div>
		</header>

		<section id="splash">
			<div id="video">
				<div class="filter"></div>

				<video id="video-video" autoplay loop>
					<source src="assets/img/splash/splash.mp4" type="video/mp4">
					<source src="assets/img/splash/splash.webm" type="video/webm">
				</video>

				<div class="video-fallback"></div>
			</div>

			<div class="content flex-middle">
				<h3 class="body bold upper"><span class="col-accent">Allen Corporation</span> presents</h3>
				<h1 class="title">McAfee<span class="sup">&copy;</span> Small Business Security</h1>

				<p class="body iso">Comprehensive security for your business.</p>

				<a href="#buy" class="btn btn-buy">See Pricing</a>
			</div>
		</section>

		<section id="award">
			<div class="content center">
				<h3 class="subtitle upper col-accent" style="opacity: 1;">New</h3>
				<h2 class="title title-header upper">AV-Test 2017 Certified</h2>

				<div class="text-content content left">
					<img id="award-img" src="assets/img/award.png" alt="av-test award">

					<p>The German anti-malware test-lab AV-Test has published the results of its latest 
					round of Mobile security effectiveness tests which focused on malware detection 
					capabilities as well as performance and features.</p>

					<p>With a score of 13 points out of 13 McAfee Mobile Security 4.8 achieved a perfect
					score of 100% (100% detection in Real Time test and 100% detection in Standard test)
					with 0% False Positives while having perfect score for Usability as well as 
					Performance.</p>

					<p>McAfee Mobile Security thus continues to be one of the best-in-class Mobile 
					Security products.</p>
	 
					<p>Also note that:</p>

					<ul>
						<li>McAfee Mobile Security managed to beat the average industry performance 
						which was 99.0%</li>

						<li>McAfee Mobile Security continued to excel in usability and performance</li> 
	 
						<li>McAfee Mobile Security achieved perfect scores when it comes to detecting 
						Mobile Ransomware families as well as the area we feel will be the biggest 
						concern in 2017, Mobile banking Trojans</li>
	 
						<li>The number of participants has dropped to 20, vendors such as AVG, Avira and
						Qihoo have withdrawn from participation.</li>
					</ul>

					<p class="center">The detailed results of the test on McAfee Mobile Security 4.8 can be found 
					<a href="https://www.av-test.org/en/antivirus/mobile-devices/android/march-2017/mcafee-mobile-security-4.8-170911/">here.</a></p>
				</div>
			</div>
		</section>

		<section id="features">
			<div class="content">
				<h3 class="subtitle upper center">Why us?</h3>
				<h2 class="title title-header upper center">Features</h2>

				<div id="highlights" class="flex flex-wrap flex-center col3 center">
					<div class="highlight">
						<div class="highlight-img" style="background-position: 0 0;"></div>
						<h4 class="body body-header bold"><span class="col-accent">Comprehensive</span> security</h4>

						<p class="body body-em">Keep your business and customer data secure with email, web, and firewall protection.</p>
					</div>

					<div class="highlight">
						<div class="highlight-img" style="background-position: 50% 0;"></div>
						<h4 class="body body-header bold">Covers <span class="col-accent">all mobile devices</span></h4>

						<p class="body body-em">Guard your PCs, Macs, smartphones and tablets against viruses, malware, and the latest online threats.</p>
					</div>

					<div class="highlight">
						<div class="highlight-img" style="background-position: 100% 0;"></div>
						<h4 class="body body-header bold">Simple and <span class="col-accent">easy to manage</span></h4>

						<p class="body body-em">Manage all of your business's devices from one central location.</p>
					</div>

					<div class="highlight">
						<div class="highlight-img" style="background-position: 0 100%;"></div>
						<h4 class="body body-header bold">Flexible licensing for <span class="col-accent">your business</span></h4>

						<p class="body body-em">Increase the number of devices as your business grows to ensure you and your employees stay protected.</p>
					</div>

					<div class="highlight">
						<div class="highlight-img" style="background-position: 50% 100%;"></div>
						<h4 class="body body-header bold">Free <span class="col-accent">award-winning support</span></h4>

						<p class="body body-em">Ensure your business stays protected with our award-winning technical support and PC Virus Removal Service for no additional cost.</p>
					</div>
				</div>

				<div class="center">
					<input type="checkbox" id="seemorefeatures">
					<label for="seemorefeatures" class="btn btn-toggle body-header"> More Features</label>

					<ul id="morefeatures" class="inline-list flex flex-wrap flex-center col4 body body-em padded-list">
						<li>PC, Mac, Android, and iOS support</li>
						<li>Next generation anti-malware engine with GTI</li>
						<li>Two-way firewall</li>
						<li>Web browsing protection</li>
						<li>Powerful anti-spam protection</li>
						<li>File shredder</li>
						<li>Backup mobile contacts</li>
						<li>Locate, track, lock, and wipe mobile devices</li>
						<li>Safeguard against risky mobile apps</li>
						<li>Free technical support</li>
						<li>Free virus removal service</li>
						<li>Cloud based management</li>
						<li style="flex-basis: 100%; list-style: none;"><a href="http://www.allencorporation.com/pdf/mcafee-small-business-security-datasheet.pdf" class="body-header">See data sheet with all features</a></li>
					</ul>
				</div>

				<div class="center" style="margin-bottom: 2em;">
					<iframe id="youtube-video" class="text-content" src="https://www.youtube.com/embed/nXhxGZAD8Jo" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</section>

		<section id="facts">
			<div class="content center">
				<h3 class="subtitle upper">Check the numbers</h3>
				<h2 class="title title-header upper">Every day: </h2>

				<ul class="flex flex-center col4 inline-list body padded-list">
					<li>
						<h4 class="title title-half col-accent">100 million</h4>
						<p>malicious URL visits prevented</p>
					</li>

					<li>
						<h4 class="title title-half col-accent">30 million</h4>
						<p>potentionally unwanted programs stopped</p>
					</li>

					<li>
						<h4 class="title title-half col-accent">104 million</h4>
						<p>malicious files removed</p>
					</li>

					<li>
						<h4 class="title title-half col-accent">29 million</h4>
						<p>risky IP address connections blocked</p>
					</li>
				</ul>
			</div>
		</section>

		<!--
		<section id="awards" class="content center">
			<h3 class="subtitle upper">Need more proof?</h3>
			<h2 class="title title-header upper center">Awards &amp; Accolades</h2>

			<ul class="inline-list padded-list center">
				<li><a class="award" href="http://chart.av-comparatives.org/awards.php?year=2016"
						style="background-position: 0 0;"></a></li>

				<li><a class="award" href="https://www.av-test.org/en/antivirus/home-windows/windows-10/october-2016/"
						style="background-position: 50% 0;"></a></li>

				<li><a class="award" href="https://securingtomorrow.mcafee.com/business/security-connected/mcafee-siem-receives-techtarget-readers-choice-awards-2014/"
						style="background-position: 100% 0;"></a></li>

				<li><a class="award" href="http://www.toptenreviews.com/software/security/best-antivirus-software/mcafee-review/"
						style="background-position: 0 100%;"></a></li>

				<li><a class="award" href="http://www.toptenreviews.com/software/security/best-antivirus-software/mcafee-review/"
						style="background-position: 50% 100%;"></a></li>

				<li><a class="award" href="http://www.pcmag.com/article2/0,2817,2469309,00.asp"
						style="background-position: 100% 100%;"></a></li>
			</ul>
		</section>
		-->

		<section id="compare">
			<div class="content">
				<h3 class="subtitle upper center">Us vs. Them</h3>
				<h2 class="title title-header upper center">Compare to other AV solutions</h2>

				<table class="table body">
					<colgroup>
						<col style="width: 20%">
						<col style="width: 10%">
						<col style="width: 10%" class="hide768">
						<col style="width: 10%">
						<col style="width: 10%" class="hide768">
						<col style="width: 10%" class="hide480">
						<col style="width: 10%">
						<col style="width: 10%">
						<col style="width: 10%" class="hide480">
					</colgroup>

					<thead>
						<tr class="body bold">
							<th></th>
							<th>McAfee</th>
							<th class="hide768">Sophos</th>
							<th>Kaspersky</th>
							<th class="hide768">ThreatTrack</th>
							<th class="hide480">ESET</th>
							<th class="hide320">Avast</th>
							<th>AVG</th>
							<th class="hide480">Bitdefender</th>
						</tr>

						<tr class="center top">
							<td></td>
							<td>Small Business Security</td>
							<td class="hide768">AV Business</td>
							<td>Small Office Security</td>
							<td class="hide768">Vipre Business AV</td>
							<td class="hide480">Endpoint AV</td>
							<td class="hide320">Endpoint Protection</td>
							<td>Endpoint AV</td>
							<td class="hide480">Small Office Security</td>
						</tr>
					</thead>

					<tbody>
						<tr class="center">
							<th class="left">Antivirus/Antispyware (PC/Mac)</th>
							<td><i class="check-full"></i></td>
							<td class="hide768"><i class="check-full"></i></td>
							<td><i class="check-half"></i></td>
							<td class="hide768"><i class="check-full"></i></td>
							<td class="hide480"><i class="check-half"></i></td>
							<td class="hide320"><i class="check-half"></i></td>
							<td><i class="check-half"></i></td>
							<td class="hide480"><i class="check-half"></i></td>
						</tr>

						<tr class="center">
							<th class="left">Access Protection/&#8203;Exploit Prevention</th>
							<td><i class="check-full"></i></td>
							<td class="hide768"><i class="check-half"></i></td>
							<td></td>
							<td class="hide768"></td>
							<td class="hide480"><i class="check-half"></i></td>
							<td class="hide320"></td>
							<td></td>
							<td class="hide480"></td>
						</tr>

						<tr class="center">
							<th class="left">Firewall</th>
							<td><i class="check-full"></i></td>
							<td class="hide768"><i class="check-full"></i></td>
							<td><i class="check-full"></i></td>
							<td class="hide768"></td>
							<td class="hide480"></td>
							<td class="hide320"></td>
							<td><i class="check-full"></i></td>
							<td class="hide480"><i class="check-full"></i></td>
						</tr>

						<tr class="center">
							<th class="left">Safe Search/&#8203;Filtering</th>
							<td><i class="check-full"></i></td>
							<td class="hide768"></td>
							<td><i class="check-half"></i></td>
							<td class="hide768"></td>
							<td class="hide480"></td>
							<td class="hide320"><i class="check-half"></i></td>
							<td></td>
							<td class="hide480"><i class="check-full"></i></td>
						</tr>

						<tr class="center">
							<th class="left">Mobile Security &amp; MDM</th>
							<td><i class="check-half"></i></td>
							<td class="hide768"></td>
							<td><i class="check-half"></i></td>
							<td class="hide768"><i class="check-half"></i></td>
							<td class="hide480"></td>
							<td class="hide320"></td>
							<td></td>
							<td class="hide480"></td>
						</tr>

						<tr class="center">
							<th class="left">Email Security</th>
							<td><i class="check-half"></i></td>
							<td class="hide768"></td>
							<td></td>
							<td class="hide768"><i class="check-full"></i></td>
							<td class="hide480"><i class="check-full"></i></td>
							<td class="hide320"></td>
							<td></td>
							<td class="hide480"></td>
						</tr>

						<tr class="center">
							<th class="left">Cloud Management</th>
							<td><i class="check-half"></i></td>
							<td class="hide768"></td>
							<td></td>
							<td class="hide768"></td>
							<td class="hide480"></td>
							<td class="hide320"></td>
							<td></td>
							<td class="hide480"><i class="check-full"></i></td>
						</tr>

						<tr class="center">
							<th class="left">Virus Removal Service</th>
							<td><i class="check-full"></i></td>
							<td class="hide768"></td>
							<td></td>
							<td class="hide768"></td>
							<td class="hide480"></td>
							<td class="hide320"></td>
							<td></td>
							<td class="hide480"><i class="check-full"></i></td>
						</tr>

						<tr class="center table-sub">
							<th class="left">Price per license</th>
							<td><span class="strike">$16</span> <span class="bold body-title">$14</span></td>
							<td class="hide768">$21</td>
							<td>$23</td>
							<td class="hide768">$15</td>
							<td class="hide480">$24</td>
							<td class="hide320">$22</td>
							<td>$25</td>
							<td class="hide480">$28</td>
						</tr>
					</tbody>

					<tfoot>
						<tr>
							<td class="center" colspan="9">* Partially supported</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</section>

		<section id="buy">
			<div class="content center">
				<h3 class="subtitle center upper">Let's get started</h3>
				<h2 class="title title-header center upper">Purchase a License</h2>

				<div class="shop-item">
					<span class="body body-title">McAfee Small Business Security License</span>

					<span id="shopify-button" class="float-right"></span>
				</div>
			</div>
		</section>

		<section id="contact">
			<div class="content">
				<h3 class="subtitle center upper">Questions?</h3>
				<h2 class="title title-header center upper">We're here to help.</h2>

				<form id="contact-form" class="content body form" method="POST" action="email.php">
					<p id="contact-status" class="status"></p>

					<input type="hidden" name="<?php echo $csrfField ?>" value="<?php echo $csrfToken ?>">
					
					<label>
						Name (Optional): 
						<input type="text" name="name" class="input" autocomplete="name" placeholder="John Doe">
					</label>

					<label>
						Email: 
						<input type="email" name="email" class="input" autocomplete="email" placeholder="johndoe@example.com" required>
					</label>

					<label>
						Message: 
						<textarea name="body" class="input" placeholder="Is McAfee Small Business Security right for me?" required></textarea>
					</label>

					<!-- <span class="body">You can also send an email to <a href="mailto:csdsales@allencorp.com">csdsales@allencorp.com</a>.</span> -->

					<input type="submit" class="btn btn-buy float-right" >
				</form>
			</div>
		</section>

		<footer class="body center">
			&copy; <a href="/" class="link-nocolor">Allen Corporation</a> 2017 - <a href="#top" class="link-nocolor">Top</a>
		</footer>

		<!-- basic js -->
		<script src="assets/js/main.js"></script>

		<!-- shopify -->
		<script src="http://sdks.shopifycdn.com/js-buy-sdk/v0/latest/shopify-buy.umd.polyfilled.min.js"></script>
		<script src="http://sdks.shopifycdn.com/buy-button/0.1.34/buybutton.js"></script>

		<script src="assets/js/shopify.js"></script>

		<!-- google analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-89245404-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>
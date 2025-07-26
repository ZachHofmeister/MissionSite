<!-- Yours, O Lord, are the greatness, the power, the glory, the victory, and the majesty; for all that is in the heavens and on the earth is yours; yours is the kingdom, O Lord, and you are exalted as head above all. - 1 Chronicles 29:11 -->

<?php 
	$name = "Friends";

	if (isset($_GET["name"])) {
		$name = preg_replace("/[^a-zA-Z' -.]/", '', $_GET["name"]);
		$name = trim(preg_replace('/\s+/', ' ', $name));
		$name = ucwords(strtolower($name));
		$name = preg_replace_callback(
			"/(?:^|[ '-])([a-z])/",
			function ($matches) {
				return strtoupper($matches[0]);
			},
			$name
		);
		$name = htmlentities($name, ENT_QUOTES, 'UTF-8');
	}
?>

<!-- PAGE 1 -->
<div class="page">
	<!-- HEADER -->
	<div class="page-section _10">
		<div class="page-item vert-center">
			<img class="contain no-lightbox" src="/2025/04/images/focus.png" alt="FOCUS logo">
		</div>
		<div class="page-item vert-center text-center w4 nopad">
			<h1 class="cardo">The Mission at Mesa</h1>
			<h5 class="italic" style="white-space: nowrap;">Zach Hofmeister<span class="no-style"> | </span>Colorado Mesa University<span class="no-style"> | </span>April + May 2025</h5>
		</div>
		<div class="page-item vert-center">
			<img class="contain no-lightbox" src="/2025/04/images/cmu.png" alt="CMU logo">
		</div>
	</div>

	<!-- MAIN IMAGE -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h100" src="/2025/04/images/easter-vigil.jpeg" alt="" style="object-position: 50% 50%;" data-caption="Our students after the Easter vigil! The five in the middle with nametags were confirmed and/or received first Holy Communion!">
		</div>
	</div>

	<!-- INTRO / PHOTO -->
	<div class="page-section _30">
		<div class="page-item">
			<div class="box">
				<h2 class="italic">Dear <?php echo htmlentities($name, ENT_QUOTES, 'UTF-8')?>,</h2>
				<p class="text-medium">
					This will be my last newsletter as a FOCUS missionary, and it seems like it's all gone way too fast. But God is so good, and I'm so thankful for all the blessings He's poured out on our campus this Easter season and this year. Thank you so much for being with me on mission!
				</p>
			</div>
		</div>
		<div class="page-item">
			<img class="photo-item h80" src="/2025/04/images/holyweek-2.jpeg" alt="" style="object-position: 50% 50%">
			<p class="caption text-medium">We invited students to go on a hike on Holy Saturday</p>
		</div>
	</div>

	<!-- Holy Week -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h70" src="/2025/04/images/holyweek-1.jpeg" alt="" data-caption=" It was a beautiful opportunity to enter into Jesus' suffering with Mary and to pray for our engagement.">
			<p class="caption text-medium">We got to pray at the Our Lady of Guadalupe shrine on Holy Thursday - the same one where I proposed to Allison.</p>
		</div>
		<div class="page-item">
			<h3>Holy Week</h3>
			<p class="text-small">For Holy Week we were able to slow down and enter into more prayer and fasting with students leading to Easter. We had good conversations with those preparing to receive sacraments and in our discipleship groups, calling to mind how much we have received from Christ and His death for us. My favorite holy week tradition the students have at Mesa is making a 3am holy hour on Good Friday.</p>
		</div>
	</div>
</div>

<!-- PAGE 2 -->
<div class="page">
	<!-- quote -->
	<div class="page-section _10">
		<div class="page-item center-center">
			<h3 class="cardo text-center"><i>"Do not be afraid; for I know that you seek Jesus who was crucified. He is not here; for He has risen, as He said. Come, see the place where He lay."</i> - <a href="https://www.biblegateway.com/passage/?search=Matthew%2028&version=RSVCE" target="_blank">Matthew 28:5-6</a></h3>
		</div>
	</div>

	<!-- Easter -->
	<div class="page-section _30">
		<div class="page-item text-right">
			<h3>Easter - Christ Is Risen!</h3>
			<p class="text-medium">We had 4 students receive sacraments at the Easter Vigil Mass. Robert and Elijah were confirmed, and Brenden and Miranda also received their first Communion! You could tell that the Holy Spirit was present in our community in the week of Easter and after; people were more joyful than usual and seemed to have a greater desire for prayer.</p>
		</div>
		<div class="page-item">
			<img class="h80" src="/2025/04/images/easter-1.jpeg" alt="">
			<p class="caption text-medium">Brenden, one of my disciples, receiving Jesus in the Eucharist for the first time at Easter</p>
		</div>
	</div>

	<!-- Photos -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h80" src="/2025/04/images/easter-2.jpeg" alt="">
			<p class="caption text-medium">Drew, me, Gabe, and Dylan being silly at brunch on Easter Sunday</p>
		</div>
		<div class="page-item">
			<img class="h80" src="/2025/04/images/bstud.jpeg" alt="">
			<p class="caption text-medium">The guys at my last Bible study meeting - Gabe led the last two himself!</p>
		</div>
	</div>

	<!-- Graduations -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h80" src="/2025/04/images/camping-retreat.jpeg" alt="">
			<p class="caption text-medium">Me, Gabe, Mason, Joe, and some more guys went on a camping retreat after Easter</p>
		</div>
		<div class="page-item">
			<h3>Graduations & Conclusions</h3>
			<p class="text-medium">After Easter, the semester began to wind down. We had final Bible studies, final discipleship meetings, and made plans for faithfulness over the summer. We got to spend a lot of quality time with our friends before saying goodbye to the ones moving on, which I am very grateful for. </p>
		</div>
	</div>
</div>

<!-- PAGE 3 -->
<div class="page">
	<!-- header -->
	<div class="page-section _10">
		<div class="page-item center-center text-center">
			<h2 class="cardo">Students Becoming FOCUS Missionaries!</h2>
			<p><i>"I tell you, lift up your eyes, and see how the fields are already white for harvest."</i> - <a href="https://www.biblegateway.com/passage/?search=John%204%3A34%2D36&version=RSVCE" target="_blank">John 4:35</a></p>
		</div>
	</div>

	<!-- Continue -->
	<div class="page-section _30">
		<div class="page-item w3 text-right">
			<p class="text-medium">It is such a blessing to have not one, but two awesome students who are now new missionaries with FOCUS! This summer, they are preparing to go to other campuses by prayer and finding partners for their mission, as you have been for me. I would love to invite you to please prayerfully consider reaching out to them and supporting them as they go to reach souls for Christ!</p>
		</div>
		<div class="page-item w2">
			<img class="h80" src="/2025/04/images/focus-grads.jpeg" alt="">
			<p class="caption text-medium">Clare, Sophie, Olivia, Jacky, and I on graduation day! Check out Liv's awesome cap!</p>
		</div>
	</div>

	<!-- Olivia -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h80" src="/2025/04/images/olivia.jpeg" alt="" style="object-position: 50% 50%;">
			<p class="caption text-medium">Olivia on placement day - she'll be serving at Northern Arizona University!</p>
		</div>
		<div class="page-item">
			<h3>Olivia Linnebur</h3>
			<p class="text-medium">Olivia served as the president of Mesa Catholic this year and is so good at bringing Jesus into everything she does and leads. She's also an incredible chef and could probably fund her mission with a side coffee business if she were allowed to. <br><a href="https://focus.org/missionaries/olivia-linnebur/" target="_blank">Read Olivia's bio and support her here!</a></p>
		</div>
	</div>

	<!-- Sophie -->
	<div class="page-section _30">
		<div class="page-item text-right">
			<h3>Sophie Schnieders</h3>
			<p class="text-medium">Sophie was a social media coordinator for Mesa Catholic and shot our engagement photos! She was also a member of the Alpha Sigma Alpha sorority and led a Bible study for her sisters. She has an outgoing heart for the Lord and is a great friend. <br><a href="https://focus.org/missionaries/sophie-schnieders/" target="_blank">Here is Sophie's bio and support link!</a></p>
		</div>
		<div class="page-item">
			<img class="h80" src="/2025/04/images/nst-sophie.jpeg" alt="">
			<p class="caption text-medium">Sophie with her teammates - she will be serving at the University of Washington!</p>
		</div>
	</div>
</div>

<!-- PAGE 4 -->
<div class="page">
	<!-- header -->
	<div class="page-section _5">
		<div class="page-item center-center text-center">
			<h3 class="cardo">...And More Missionaries!</h3>
		</div>
	</div>

	<!-- Robert -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h90" src="/2025/04/images/robert.jpeg" alt="">
			<p class="caption text-medium">Me and Robert</p>
		</div>
		<div class="page-item">
			<h3>Robert</h3>
			<p class="text-small">Robert was inspired by his confirmation teacher, Ace, to serve as a missionary to kids and teens over the summer with a Catholic program called Totus Tuus. He's currently spending 8 weeks at 8 different Colordo parishes, sharing his testimony, leading camp activities, and running around with kids. I'm super proud of him and excited to hear how the Holy Sprit is working in and through him!</p>
		</div>
	</div>

	<!-- CMU -->
	<div class="page-section _30">
		<div class="page-item text-right">
			<h3>The New CMU Team</h3>
			<p class="text-medium">At FOCUS summer training, Joe and Jacky welcomed Amanda and Mauricio - two new first-year missionaries coming to Colorado Mesa in the fall! I'm excited to get to meet them in August.</p>
		</div>
		<div class="page-item">
			<img class="h80" src="/2025/04/images/nst-mesa.jpeg" alt="">
			<p class="caption text-medium">Joe, Amanda, Mauricio, and Jacky on Placement Day at training</p>
		</div>
	</div>

	<!-- USAFA -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h90" src="/2025/04/images/usafa.jpeg" alt="">
			<p class="caption text-medium">The USAFA graduation ceremony at Falcon Stadium</p>
		</div>
		<div class="page-item">
			<h3>Air Force Academy Graduation</h3>
			<p class="text-medium">I went to 3 graduation ceremonies in May - CMU, Allison's school, and the USAFA graduation! It was so awesome to watch Pete, Joe, Rod, James, and many other friends graduate from the Academy and move on to the next stages of their lives. They are now enjoying a 60 day break before moving to their new jobs. Please keep them in your prayers!</p>
		</div>
	</div>
</div>

<!-- PAGE 5 -->
<div class="page">
	<!-- header -->
	<div class="page-section _10">
		<div class="page-item center-center">
			<h2>More Photos!</h2>
		</div>
	</div>

	<!-- photos -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h80" src="/2025/04/images/trackmeet.jpeg" alt="" >
			<p class="caption text-large">A group of us went to support our friends competing in a track meet 🏃🏻‍♂️</p>
		</div>
		<div class="page-item">
			<img class="h80" src="/2025/04/images/frcarl.jpeg" alt="" >
			<p class="caption text-large">Father Carl came over for Divine Mercy Sunday and gave us a concert! 🎸</p>
		</div>
	</div>
	
	<!-- photos -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h80" src="/2025/04/images/jacky.jpeg" alt="" >
			<p class="caption text-large">We celebrated Jacky's birthday together 👑</p>
		</div>
		<div class="page-item">
			<img class="h80" src="/2025/04/images/minecraft.jpeg" alt="" >
			<p class="caption text-large">My disciples invited me to go see the Minecraft movie with them 🍿</p>
		</div>
	</div>

	<!-- photos -->
	<div class="page-section _30">
		<div class="page-item">
			<img class="h80" src="/2025/04/images/holyweek-3.jpeg" alt="">
			<p class="caption text-large">A fun picture from the Holy Saturday hike 🥾</p>
		</div>
		<div class="page-item">
			<img class="h80" src="/2025/04/images/guys.jpeg" alt="" >
			<p class="caption text-large">One of the last times we had a lot of the guys together 🥲</p>
		</div>
	</div>
</div>

<!-- PAGE 6 -->
<div class="page">

	<!-- PRAYER INTENTIONS -->
	<div class="page-section _25">
		<div class="page-item">
			<h3>Prayer Requests</h3>
			<ul class="text-medium">
				<li>Please keep praying for Allison and I as we prepare for marriage this September</li>
				<li>For joy and fruitfulness on mission for Olivia, Sophie, the new CMU team, and all of FOCUS as they share the good news of Jesus with the world</li>
				<li>For the healing of an anonymous student</li>
			</ul>
		</div>
		<div class="page-item">
			<ul class="text-medium">
				<li>For Gabe and Barrett who are leaving CMU, that they would find faithful Catholic friends who lead them to love the Lord</li>
				<li>For Jacky and Joe as they stay on mission</li>
				<li>For my job search, especially the discernment of God's will and courage to share the Gospel in every new setting</li>
			</ul>
		</div>
	</div>

	<!-- THANK YOU -->
	<div class="page-section _40">
		<div class="page-item text-medium">
			<div class="box">
				<h2 class="italic">Thank You For Everything</h2>
				<p class="text-medium">I cannot thank you enough for your prayers over these past three years for me, my teammates, and my students. God loves it when we ask that others would come to know Him on earth, and I know your prayers have supported me and opened so many doors for Him. Thank you also for your financial support, past or present, that enabled me to encounter so many souls at Colorado Mesa and USAFA. This is the end of my mission with FOCUS, but it's not the end of the fruit that God has tended over these years through our prayers and work that we have shared. Above all, I am praying that you would continue to come to know Him and fall in love with Him more and more, and I ask that you would pray that for me as well. He loves us so much.</p>
				<p class="text-medium text-right">
					Until we meet again, Zach
				</p>
			</div>
		</div>
	</div>

	<!-- PHOTO / THANK YOU -->
	<div class="page-section _25">
		<div class="page-item">
			<img class="photo-item h80" src="/2025/04/images/lajolla.jpeg" alt="">
			<p class="caption text-large">Goodbye from the '24-'25 CMU missionary team!</p>
		</div>
		<div class="page-item">
			<img class="photo-item h80" src="/2025/04/images/allison.jpeg" alt="">
			<p class="caption text-large">Please pray for Allison and I as we prepare for our marriage!</p>
		</div>
	</div>
	
	<!-- FOOTER -->
	<div class="page-section _10" id="nl-footer"><script src="/js/nl-footer.js"></script></div>
</div>
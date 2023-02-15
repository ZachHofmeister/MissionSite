-- WARNING: WILL DELETE ALL NEWSLETTERS
SET SQL_SAFE_UPDATES = 0;
DELETE FROM newsletters;
SET SQL_SAFE_UPDATES = 1;

CALL add_newsletter(
	"August Update", 
	"Hello friends! I am so excited to bring you an update from this first month of being on mission at the Air Force Academy!", 
	"/2022/08/newsletter.html", 
	"/2022/08/cliff-jumping.jpeg",
	"2022-08-01", 
	"Zach Hofmeister",
	1, 
	"2022-08-24"
);
CALL add_newsletter(
	"September Update", 
	"Hello again, and happy fall! I'm excited to share some of my highlights from this past month with you!", 
	"/2022/09/newsletter.html", 
	"/2022/09/retreat-all.jpg",
	"2022-09-01", 
	"Zach Hofmeister",
	1, 
	"2022-09-21"
);
CALL add_newsletter(
	"October Update", 
	"I hope that your October has gone well! Colorado has gone through quite a beautiful transformation", 
	"/2022/10/newsletter.html", 
	"/2022/10/camping-mass.jpg",
	"2022-10-01", 
	"Zach Hofmeister", 
	1, 
	"2022-10-31"
);
CALL add_newsletter(
	"November Update", 
	"I hope you had a great Thanksgiving! I have no shortage of things to be thankful for this year, but I am especially grateful for", 
	"/2022/11/newsletter.html", 
	"/2022/11/dallas-victory.jpeg", 
	"2022-11-01", 
	"Zach Hofmeister",
	1, 
	"2022-11-30"
);
CALL add_newsletter(
	"Christmas Card", 
	"Thank you so much for your prayers and support throughout this year!", 
	"/2022/12/newsletter.html", 
	"/2022/12/1.png",
	"2022-12-01", 
	"Zach Hofmeister",
	1, 
	"2022-12-24"
);
CALL add_newsletter(
	"January Update", 
	"Happy New Year! I hope that you all had a very Merry Christmas and that the Lord fills 2023 with blessings for you!", 
	"/2023/01/newsletter.html", 
	"/2023/01/seek-reunion.jpeg",
	"2023-01-01", 
	"Zach Hofmeister",
	1, 
	"2023-01-25"
);
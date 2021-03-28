# Showoff
Showoff is a simple social media made with php to share song lyrics around the world.

## Overview
### Register
Once you go to the website (index.php) you cannot access it if you're not logged in, so you have to register. You will be redirected to the login page if you're not logged in. To register simply click "register" somewhere below the login button. This uses client-size and server-side validation and sanitizer
```
Requirements: Email must be valid, Username's minimum length is 2 and no special characters. Password's minimum length is 5
```

### Login
Similarly to register, you cannot access index.php if you're not logged in, to login you must register first. To login you can go to this link Login Page. This uses client-side and server-side validation.
```
Requirements: Username must exist in the database, and Password must match the password in the database
```

### Navigation
This website's navigation is simple as it only has two pages, home page and documentation page.

### Profile Section
Profile section is where you can see your own profile. This is where you can see your Name, Usernaame, Email, and UserID (from the database). But not only that, you can also see the logout button where you can log off.

We can also see the animation here made with @keyframes, you can click the arrow up button to hide the profile container and you can click it back to unhide.
You can also click the your name and your profile would show like below.

### Post Section
Post section is where you can post your own song.
```
Requirements: Title must have between 2 and 30 characters, Content must have between 5 and 255 characters.
```

### Top Artist Section
Top Artist Section is where you can see top posters based on one of their post's likes. I used a masonry layout for this using flexbox and it was inspired by assignment 4 where we used masonry layout to display random pictures.
You can also click on their name and their profile would show below your profile section.

### References
```
Flexbox layout was inspired from Kevin Powell's youtube channel.

-Validate email (server-side) w3schools

-Logo Icon:Showoff Logo
Icons made by Eucalyp from www.flaticon.com
-User Icon:user icon
Icons made by Freepik from www.flaticon.com
-Top 1 Crown Icon:top 1 icon
Icons made by Freepik from www.flaticon.com
-Top 2 Crown Icon:top 2 icon
Icons made by Freepik from www.flaticon.com
-Top 3 Chain Icon:top 3 icon
Icons made by Freepik from www.flaticon.com
All Lyrics:

AZlyrics.com (Drip Too Hard) by LilBaby
AZlyrics.com (Wants and Needs) by Drake
AZlyrics.com (Pauwi Nako) by Flow G
AZlyrics.com (What You Know Bout Love) by Pop Smoke
AZlyrics.com (Go Crazy) by Chris Brown
AZlyrics.com (Toxic) by Kehlani
AZlyrics.com (Don't) by Bryson Tiller
AZlyrics.com (How To Love) by Luh Kel
AZlyrics.com (Slow Motion) by Trey Songz
```

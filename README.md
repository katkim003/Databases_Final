# Databases_Final

a. A brief overview of how our code is structured
 
Our code is written in html and php. We used XAMPP which allowed us to create our tables in phpMyAdmin. Our code is in our XAMPP htdocs folder in the folder "test1". We have our index page (index.php) which is the first page you see when you go to our localhost site (ours is on localhost:8080/test). Our file comment.php is the code for our comment box on the Index page. It updates our table Comment with the user comment and displays it on the page when you return to the Home page. In our table it is input with an auto-incremented comment_id, timedate stamp, and the text from the user input comment. Our file submita.php is the code for what occurs when an Artist name is selected from the drop down on the home page and the submit button is hit. It returns artist information. Our file submits.php is the code that runs either when you select a song from the drop down on the home page or select a song from the drop down after selecting an artist name. It returns song information. The file submitm.php contains the code for when the user selects a month from the drop down on the home page and selects submit. This returns the chart of the top 100 songs in that month.
 
 b. How to compile, set up, deploy, and use the system
 
Once all .php files are downloaded as the folder "test1", drag folder into XAMPP's lampp>htdocs. Using XAMPP to run the local host, and using phpMyAdmin in XAMPP create the 4 tables with parameters as specified in the video demonstration. Once parameters are set, you can download the respective .csv files and import them into the proper table. When you enter in your search bar: localhost:8080/test1 it will take you to the home page of our website.

c. Any limitations in our current implementation

We are limited on the amount of data we collected. Data collection was difficult and most was done by hand. Since there are 100 songs a month, we were constrained to limit our database to one year. We are also susceptible to SQL injection attacks due to our comment box section on the home page. 

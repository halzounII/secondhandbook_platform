This is an individual workplace for the joint project of NTUEE's second-handed book transaction platform.
Please refer to ycchang0324(https://github.com/ycchang0324) for more information.

template guide:
* statistics.php: use the function "bookStat()" to get the stock of the textbook. Please ignore the content inside <form>.
* form.php: use the function regBook "regBook()" to register the book. It can only register one per call, so if you'd like to register several books sold by the same seller, call it more than one time. Please ignore the other content, or view line 52 and line 63-75 if you'd like to know how to set up the verification code.
* txt file : the instruction of the website.
  
Remark: Please modify the path of the "require" in each file to the database file to have template function correctly. The functions haven't been finished, there will be errors if you require it right now.

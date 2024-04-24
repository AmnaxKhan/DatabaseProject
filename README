
Here is a summary.

1. cd                        // go to your home directory
2. chmod o+x public_html     // make sure that your web directory is accessible by everyone
3. cd public_html            // go to your web space
4. cp ~sgauch/public_html/4523/S23/hw/project/*.tar .     // copy the 4 tar files to your new directory
5. tar xvf project_python.tar   // untar the sample python code
6. chmod -R 755 project_python     // make the project_python directory accessible by everyone
7. cd project_python
8. Open:  http://www.csce.uark.edu/~MYUSERNAME/project_python/hello.html in a web browser
9. Edit insert_new_item.py; replace MYUSERNAME and MYMYSQLPASSWORD with yours
10. Open:  http://www.csce.uark.edu/~MYUSERNAME/project_python/hello.php in a web browser
11. Open:  http://www.csce.uark.edu/~MYUSERNAME/project_python/python_insert_item.php in a web browser


hello.html
   A static html page to check that your project directory is accessible on the web

hello.php
   A php page that uses a form to get user input, then calls hello.class to echo it to the screen.
   This checks that you can call php in your own directory and have it pass parameters to
   an executable program.

hello.py
   The executable program called from hello.php.


insert_new_item.py
   A sample python program that includes (and uses) python_db file that has the db functions.  It has been provided as just a sample to help you understand how to interact between php, db function and python.
   command line, in the order:  name price_per_lb roasting
   e.g.,
      turing$ python3 insert_new_item.py robusta 12 M
   It connects to mysql to insert that new item into the ITEM table. You need to change the ID from the program or write your own function to increment the ID everytime your run this program. As running the program twice without change the ID will result in duplication and finally will exit with error.

python_insert_item.php
   The php program that displays a form, parses the user's input, then calls a program,
   i.e., insert_new_item.py, using a system call.
   The program called python_db.py to connect to mysql to insert a record into a table.

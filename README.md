
     ,-----.,--.                  ,--. ,---.   ,--.,------.  ,------.
    '  .--./|  | ,---. ,--.,--. ,-|  || o   \  |  ||  .-.  \ |  .---'
    |  |    |  || .-. ||  ||  |' .-. |`..'  |  |  ||  |  \  :|  `--, 
    '  '--'\|  |' '-' ''  ''  '\ `-' | .'  /   |  ||  '--'  /|  `---.
     `-----'`--' `---'  `----'  `---'  `--'    `--'`-------' `------'
    ----------------------------------------------------------------- 


Hi there! Welcome to Cloud9 IDE!

To get you started, we have created a small hello world application.

1) Open the hello-world.php file

2) Follow the run instructions in the file's comments

3) If you want to look at the Apache logs, check out ~/lib/apache2/log

And that's all there is to it! Just have fun. Go ahead and edit the code, 
or add new files. It's all up to you! 

Happy coding!
The Cloud9 IDE team


## Support & Documentation

Visit http://docs.c9.io for support, or to learn more about using Cloud9 IDE. 
To watch some training videos, visit http://www.youtube.com/user/c9ide

What can they input?
I want to edit [thread]/[post] of number [number].
I am named [name] and have role [role]

array(3) { 'object' => string(1) "t" 'id' => string(1) "a" 'username' => string(1) "s" } 

Users:
Adam
Bob
Cindy
Darren
Epsilon
Fa
German

Roles:
Admin
Mod
Author
User

Objects:
thread
post
users

Operations:
C
R
U
D

Admins can CRUD anything
Mods can RUD any thread and post
Authors can CRUD their own topics/threads
Users can CRUD their own posts 

Admins:
Adam

Mods:
Bob
Cindy

Authors:
Darren
Epsilon

Users:
Fa
German

Currently everyone can read everything, adding users isn't in yet

Warning: users is from users2, isn't used because auth + forum isn't working.
users_in is useless here.
For some reason anything with REFERENCES roles(role) is going bonkers and stopping everything
Scratch that, anything with role or roles besides the roles table is odd

CREATE TABLE rolesxpermissions(ID INT primary key, role VARCHAR, pID VARCHAR, FOREIGN KEY(role) REFERENCES roles(role), FOREIGN KEY(pID) REFERENCES permissions(ID));
sqlite> insert into rolesxpermissions values(2, "Admin", 2);
Error: foreign key mismatch - "rolesxpermissions" referencing "roles"
sqlite> select role from roles where role = "Admin";


var inputs = 
    {
        permission: "",
        object: "",
        id: "",
        username: "",
        thread: "",
        post: "",
        content: ""
    };

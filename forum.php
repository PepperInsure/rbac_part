
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

//Check userxroles joined with rolesxpermissions joined with permissions to see if they can do what they request

function check_permissions($input, $dbhandle)
{
    $query = "SELECT usersxroles.user, usersxroles.role, permissions.op, permissions.object 
    FROM usersxroles INNER JOIN rolesxpermissions ON usersxroles.role = rolesxpermissions.role 
    INNER JOIN permissions ON rolesxpermissions.pID = permissions.ID
    WHERE usersxroles.user=:user AND permissions.op=:permission AND permissions.object=:object;";
    
    //echo $input["username"];
    //echo $input["permission"];
    //echo $input["object"];
    $statement = $dbhandle->prepare($query);
    $statement->execute(array(
        "user" => $input["username"],
        "permission" => $input["permission"],
        "object" => $input["object"]
    ));
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    //echo var_dump($results);
    if ($results)
    {
        echo "You have the power!";
    }
    else 
    {
        echo "You don't have permission!";
    }
    
    
    
}

//Check if the names are right

//Create
function create_thread($input, $dbhandle)
{
    $query = "INSERT INTO thread VALUES(:thread, :username, :content);";
    $statement = $dbhandle->prepare($query);
        
    $statement->execute(array(
        "thread" => $input["thread"],
        "username" => $input["username"],
        "content" => $input["content"]
        ));
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo $results;
}


function create_post($input, $dbhandle)
{
    $query = "INSERT INTO post VALUES(:post, :username, :content, :thread);";
    $statement = $dbhandle->prepare($query);
        
    $statement->execute(array(
        "post" => $input["post"],
        "username" => $input["username"],
        "content" => $input["content"],
        "thread" => $input["thread"]
        ));
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo $results;
}



//Read

//Update
//update thread set post="OOO" where ID=3;
function update_thread($input, $dbhandle)
{
    
    $query = "UPDATE thread SET post=:content WHERE ID=:thread);";
    $statement = $dbhandle->prepare($query);
    
    echo $input["content"];
    echo $input["thread"];
        
    $statement->execute(array(
        "content" => $input["content"],
        "thread" => $input["thread"]
        ));
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo $results;
    
}


function update_post($input, $dbhandle)
{
    $query = "UPDATE thread SET post=:content WHERE ID=:post);";
    $statement = $dbhandle->prepare($query);
    
    $statement->execute(array(
        "content" => $input["content"],
        "post" => $input["post"]
        ));
        
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo $results;
}



//Destroy
//Not here yet

$dbhandle = new PDO("sqlite:accounts.sqlite") or die("Failed to open DB");
if (!$dbhandle) die ($error);

$user_input = $_POST["user_input"];

check_permissions($user_input, $dbhandle);

if ($user_input["permission"] == "create")
{
    if($user_input["object"] == "thread")
    {
        create_thread($user_input, $dbhandle);
    }
    if($user_input["object"] == "post")
    {
        create_post($user_input, $dbhandle);
    }
}
if ($user_input["permission"] == "update")
{
    if($user_input["object"] == "thread")
    {
        update_thread($user_input, $dbhandle);
    }
    if($user_input["object"] == "post")
    {
        update_post($user_input, $dbhandle);
    }
}



//header('Content-type: application/json');
//echo json_encode($user_input);


?>

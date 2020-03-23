<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<style>
/* body{
margin: 0;
padding: 0;
background-image: linear-gradient(to right,#ac1816,#2980b9);
font-family: Montserrat;
} */

.card{
position: relative;
width: 30%;
height: 600px;
background-color: white;
margin-top: 10%;
margin-left: 30%;
border-radius: 5px;
}

.blackcard{
position: absolute;
width: 100%;
height: 200px;
background-color: rgb(206, 206, 206);
border-radius: 5px;
margin-top: -5px;
}

.profile-picture{
position: absolute;
width: 25%;
border-radius: 100%;
border: 3px white solid;
top: 18%;
margin-left: 3%;
}

.form{
position: absolute;
width: 50%;
height: 50px;
margin-left: 40%;
margin-top: 20px;
overflow: hidden;
}

.form input{
position: absolute;
width: 100%;
height: 100%;
background: none;
color: white;
border: none;
box-sizing: border-box;
padding-top: 20px;
outline: none;
font-family: Montserrat;
}

.content-input{
position: absolute;
color: white;
width: 100%;
bottom: 0;
border-bottom: 1px white solid;
pointer-events: none;
}

.content-input::after{
content: "";
position: absolute;
height: 2px;
width: 100%;
background-color: #535c68;
bottom: -1px;
left: -100%;
transition: 0.5s;
}

.content-text{
position: absolute;
bottom: 5px;
transition: 0.5s;
}

.form input:focus + .content-input span,.form input:valid + .content-input span{
bottom: 25px;
font-size: 13px;
}

.form input:focus + .content-input::after,.form input:valid + .content-input::after{
left: 0;
}

.content-input-white{
position: absolute;
color: black;
width: 100%;
bottom: 0;
border-bottom: 1px black solid;
pointer-events: none;
}

.content-input-white::after{
content: "";
position: absolute;
height: 2px;
width: 100%;
background-color: #535c68;
bottom: -1px;
left: -100%;
transition: 0.5s;
}

.form input:focus + .content-input-white span,.form input:valid + .content-input-white span{
bottom: 25px;
font-size: 13px;
}

.form input:focus + .content-input-white::after,.form input:valid + .content-input-white::after{
left: 0;
}

.go{
position: absolute;
margin-top: 470px;
margin-left: 15%;
width: 70%;
height: 70px;
background-color: rgb(131, 0, 0);
background-size: 200%;
transition: 0.7s;
transition-property: background-color;
outline: none;
border: none;
font-family: Montserrat;
color: white;
font-size: 20px;
cursor: pointer;
}

.go:hover{
background-color: red;
}

</style>

<body>
        <div class="card">
            <div class="blackcard">
  <img src="../public/images/profile_icon.png" class="profile-picture">
                <!-- <img src="https://cdn.discordapp.com/avatars/320349801164177408/3f6910bec813b20b227477445df8c4e4.png?size=128"
                class="profile-picture" > -->
                <div class="form">
                    <input type="text" name="Name" id="name" autocomplete="off" required />
                    <label class="content-input">
                        <span class="content-text">Name</span>
                    </label>
                </div>
                <div class="form" id="username" style="margin-top: 70px;">
                    <input type="text" name="Username" id="username" autocomplete="off" required />
                    <label class="content-input">
                        <span class="content-text">email</span>
                    </label>
                </div>
                <div class="form" id="bio" style="margin-top: 120px;">
                    <input type="text" name="Bio" id="bio" autocomplete="off" required />
                    <label class="content-input">
                        <span class="content-text">Bio</span>
                    </label>
                </div>
            </div>

            </body>
</html>
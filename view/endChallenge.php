<style>

table,
th,
td {
border: solid 1px #000;
padding: 10px;
flex-direction: column;
justify-content: center;
align-items: center;
font-weight: bold;
}

table {
width: 750px;
border-collapse: collapse;
margin: 50px auto;
border-collapse: collapse;
caption-side: bottom;
flex-direction: column;
justify-content: center;
align-items: center;
}

tbody {
display: table-row-group;
vertical-align: middle;
border-color: inherit;
}

caption {
font-size: 16px;
font-weight: bold;
padding-top: 5px;
}

#accountBtns {
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
}

button:hover {
opacity: 0.8;
}

#signInText,
#createAccount {
display: block;
width: 40vh;
height: 20%;
padding: 14px 0;
border-radius: 10px;
background-color: white;
font-size: 1.1em;
margin: 0 0 10px 0;
text-transform: uppercase;
text-decoration: none;
}

.btn {
margin: 10px;
padding: 30px;
text-align: center;
text-transform: uppercase;
transition: 0.5s;
background-size: 200% auto;
color: white;
outline: none;
border-radius: 10px;
background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);
}

</style>

<table align="center">

<thead>
      <tr>
        <th colspan="3">ScoreBoard</th>
      </tr>
</thead>

<tbody>

      <tr>
        <td>Singer</td>
        <td>Music</td>
        <td>Score</td>
      </tr>

      <tr>
        <td>Jeremy</td>
        <td>bad guy</td>
        <td>58</td>
      </tr>

      <tr>
        <td>Marie</td>
        <td>we will rock you</td>
        <td>85</td>
      </tr>
  
    <tr>
        <td>Stas</td>
        <td>gangnam style</td>
        <td>55</td>
    </tr>

    <tr>
        <td>EunHye</td>
        <td>likey</td>
        <td>95</td>
    </tr>

    <tr>
        <td>James</td>
        <td>thriller</td>
        <td>90</td>
    </tr>

    </tbody>
 
</table>

<?php 
require("newChallenge.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample CRUD</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap');

    * {
        padding:0;
        margin:0;
        font-family: 'Exo 2', sans-serif;
    }
    body {
        padding:2dvh;
        display: flex;
        justify-content: center;
        background-color:black;
    }
    .box {
        border: .1dvh solid rgba(0,0,0,30%);
        padding:1dvh;
        border-radius:3dvh;
        width:80%;
        height:100%;
        background-color:rgba(209, 224, 224,80%);
    }
    .header {
        background-color:black;
        color:white;
        margin-bottom:1dvh;
        padding:.5dvh;
        border-radius:3dvh;
    }
    .content {
        display: flex;
    }
    .msg {
        background-color:rgb(251, 242, 184);
        width:90%;
        margin:1dvh;
        padding:.5dvh;
        border-radius:1dvh;
    }
    .sub {
        padding:1dvh;
        width: 50%;
    }
    .group {
        margin:1dvh;
        display:flex;
    }
    .submit {
        padding-left:40%;
    }
    .label {
        width:40%;
    }
    table {
        width:100%;
        border-collapse: collapse;
        background-color:black;
        border-radius:2dvh;
    }
    th{
        color:rgb(251, 242, 184);
        padding:1dvh;
        border-bottom:gray;
    }
    td {
        text-align:center;
        color:white;
        padding:2dvh;
    }
    tr {
        border-bottom: .2dvh solid gray;
    }
    tr:last-child {
        border-bottom: none;
    }
    a {
        text-decoration: none;
    }
    a:hover {
        color:rgb(251, 242, 184);
    }
    a:active {
        color:rgb(251, 242, 184);
    }
    a:visited {
        color:white;
    }
    h4 {
        font-size:3dvh;
    }
    h1 {
        margin:.5dvh;
        margin-left:1.5dvh !important;
    }
    label {
        font-size:3dvh;
    }
    input[type = text] {
        border-radius:2dvh;
        padding: .4dvh;
        padding-left: 1dvh !important;
        font-size:3dvh;
        width:50%;
    }
    input[type = submit] {
        border-radius:2dvh;
        padding: .4dvh;
        font-size:2.5dvh;
        width:86%;
        background-color:black;
        color:white;
    }
    input[type = submit]:hover {
        background-color:rgba(0,0,0,70%);
    }
    @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}

    td:nth-of-type(1):before { content: "ID"; }
	td:nth-of-type(2):before { content: "Clothing Name"; }
	td:nth-of-type(3):before { content: "Size"; }
	td:nth-of-type(4):before { content: "Quantity"; }
	td:nth-of-type(5):before { content: "Price"; }
	td:nth-of-type(6):before { content: "Actions"; }
    
    }
</style>
<body>
    <div class='box'>
        <div class='header'>
            <h1>Manage</h1>
        </div>
        <hr>
        <div class='content'>
            <div class='sub'>
            <?php if(isset($msg)):?>
                <div class='msg'>
                    <center>
                        <h4><?= $msg; ?></h4>
                    </center>
                </div>
            <?php endif;?>
                <form action='/Save' method='post'>
                    <input type='hidden' name='id' value='<?php if(isset($selected['id'])): ?><?= $selected['id']; endif; ?>'>
                    
                    <div class='group'>
                        <div  class='label'>
                            <label for='Name'>Clothing Name:</label>
                        </div>
                        <input type='text' name='Name' value='<?php if(isset($selected['Name'])): ?><?= $selected['Name']; endif; ?>' required />
                    </div>

                    <div class='group'>
                        <div  class='label'>
                            <label for='Size'>Clothing Size:</label>
                        </div>
                        <input type='text' name='Size' value='<?php if(isset($selected['Size'])): ?><?= $selected['Size']; endif; ?>' required /> 
                    </div>

                    <div class='group'>
                        <div  class='label'>
                            <label for='Quantity'>Clothing Quantity:</label>
                        </div>
                        <input type='text' name='Quantity' value='<?php if(isset($selected['Quantity'])): ?><?= $selected['Quantity']; endif; ?>' required />
                    </div>

                    <div class='group'>
                        <div  class='label'>
                            <label for='Price'>Clothing Price:</label>
                        </div>
                        <input type='text' name='Price' value='<?php if(isset($selected['Price'])): ?><?= $selected['Price']; endif; ?>' required />
                    </div>

                    <div class='submit'>
                        <input type='submit'  value='Submit' />
                    </div>
                </form>
            </div>
            <div class='sub'>
                <center>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Clothing Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th colspan='2'>Actions</th>
                            </tr>
                        </thead>
                    <?php foreach($Clothes as $val): ?>
                        <tr>
                            <td><?= $val['id']; ?></td>
                            <td><?= $val['Name']; ?></td>
                            <td><?= $val['Size']; ?></td>
                            <td><?= $val['Quantity']; ?></td>
                            <td><?= $val['Price']; ?></td>
                            <td><a href='<?= base_url(); ?>/Edit/<?= $val['id']; ?>'>Edit</a></td>
                            <td><a href='<?= base_url(); ?>/Delete/<?= $val['id']; ?>'>Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                </center>
            </div>
        </div>
    </div>
    
</body>
</html>
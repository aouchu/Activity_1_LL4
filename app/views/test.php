<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo '<h1 style="font-size:15vh" >Hello,'.$name.'!</h1>'; ?>
    <table border=1>
        <Tr>
            <th> Username </th>
            <th> Password </th>
</tr>
    <?php foreach($users as $p): ?>
        <tr>
            <td><?= $p['username']; ?> </td>
            <td><?= $p['password']; ?> </td>
    </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
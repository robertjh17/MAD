
<tr>
    <td><?= $data['name']; ?></td>
    <td><?= $data['date']; ?></td>
    <td><a href="?page=project&function=edit&id=<?php echo $data['id']; ?>">Bewerk</td>
    <td><a href="?page=project&function=delete&id=<?php echo $data['id']; ?>">Verwijder</td>
<tr>

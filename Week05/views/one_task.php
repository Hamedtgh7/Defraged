<h3>Task with <?php echo $task['id'] ?></h3>


<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Is Done</th>
    </tr>
    <tr>
        <td><?php echo $task['title']; ?></td>
        <td><?php echo $task['description']; ?></td>
        <td><?php echo $task['is_done'] ? 'Yes' : 'No'; ?></td>
    </tr>
</table>
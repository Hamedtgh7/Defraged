<h1>Tasks</h1>


<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Is Done</th>
        <th>Action</th>
        <th></th>
    </tr>
    <?php foreach ($tasks as $task) { ?>
    <tr>
        <td><a href="/todolist/<?php echo $task['id'] ?>"><?php echo $task['title']; ?></a></td>
        <td><?php echo $task['description']; ?></td>
        <td><?php echo $task['is_done'] ? 'Yes' : 'No'; ?></td>
        <td>
            <form action="/updateIs_Done" method="'post">
                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                <input type="hidden" name="is_done" value="<?php echo $task['is_done'] ? 0 : 1; ?>">
                <button type="submit"><?php echo $task['is_done'] ? 'Mark Not Done' : 'Mark Done'; ?></button>
            </form>
        </td>
        <td>
            <form action="/delete_task" method="'post">
                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="/create_task">
    <button type="button"> Create Task</button>
</a>
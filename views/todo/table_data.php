<table class="table table-sm table-success">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Task name</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <?php if (!empty($data['todos'])):?>
    <tbody>
    <?php foreach ($data['todos'] as $key => $todo): ?>
        <tr>
            <td class="table-success"><?= ++$key ?></td>
            <td class="table-success"><?= $todo->task_name ?></td>
            <td class="table-success"><?= $todo->start_date ?></td>
            <td class="table-success"><?= $todo->end_date ?></td>
            <td class="table-success" data-id="<?= $todo->id ?>">
                <a href="#">
                    <i style="cursor: pointer" class="fa fa-edit"></i>
                </a>
            </td>
            <td class="table-success">
                <a href="index.php?controller=ToDo&action=delete&id=<?= $todo->id ?>">
                    <i style="cursor: pointer" class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
    <?php else:?>
    <tbody>
        <tr>
        ...
        </tr>
    </tbody>
    <?php endif;?>
</table>
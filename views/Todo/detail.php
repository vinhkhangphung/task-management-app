<?php
require_once("components/header.php");
?>

    <div class="pt-8">
        <div class="border border-4 border-double border-blue-400/80 text-4xl
    text-center p-4 flex items-center justify-center w-96 mx-auto">
            <?php echo $this->data['title']; ?>
        </div>
        <div class="items-center justify-center w-96 mx-auto pl-2 text-xl">
            <div><?php echo $this->data['content'] ?></div>
            <ul>
                <li><?php echo $this->data['create_time'] ?></li>
                <li><?php echo $this->data['prio'] ?></li>
            </ul>
        </div>
        <div class="items-center justify-center w-fit mx-auto pt-4 text-lg">
            <button class="mr-10 border border-2 border-black/40 p-1 opacity-50 disabled">
                <a href="#">
                    Previous task
                </a>
            </button>
            <button class="mr-10 border border-2 border-black/40 p-1 uppercase">
                <a href="http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/index.php?controller=todo&action=edit&id=<?php echo $this->data['id'] ?>">
                    Edit task
                </a>
            </button>
            <button class="border border-2 border-black/40 p-1 opacity-50 disabled">
                <a>
                    Next task
                </a>
            </button>
        </div>
    </div>

<?php
require_once("components/footer.php");

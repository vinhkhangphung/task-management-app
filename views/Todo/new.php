<?php
require_once("components/header.php");
?>

<h1 class="text-3xl text-center mt-4 font-semibold">
    Create new Task
</h1>
<form class="flex justify-center flex-col mt-4" method="post">
    <input class="hidden" type="text" value="todo" name="controller">
    <input class="hidden" type="text" value="new" name="action">
    <div class="mx-auto">
        <input class="border border-1 border-black block mt-4 pl-4 py-2 text-2xl" type="text" name="title" autocomplete="off">
        <label class="mx-auto opacity-50">Title</label>
    </div>
    <div class="mx-auto">
        <input class="border border-1 border-black block mt-4 pl-4 py-2 text-2xl" type="text" name="content" autocomplete="off">
        <label class="mx-auto opacity-50">Note</label>
    </div>
    <div class="flex flex-row mx-auto mt-4">
        <input class="border border-1 border-black block mt-4 mr-1" type="radio" name="prio" value="High" HIGH>
        <label class="mx-auto mr-4 mt-2 text-lg">High</label>
        <input class="border border-1 border-black block mt-4 mr-1" type="radio" name="prio" value="Normal" NORMAL>
        <label class="mx-auto mr-4 mt-2 text-lg">Normal</label>
        <input class="border border-1 border-black block mt-4 mr-1" type="radio" name="prio" value="Low" LOW>
        <label class="mx-auto mr-4 mt-2 text-lg">Low</label>
    </div>

    <input class="mt-4 text-xl uppercase border border-2 border-black/40 w-fit p-2 mx-auto" type="submit">
</form>

<?php
require_once("components/footer.php");

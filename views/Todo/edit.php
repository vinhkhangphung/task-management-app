<?php
require_once("components/header.php");
?>
    <script>
        function handleSubmit() {
            const title = document.getElementById('title').value;
            const content = document.getElementById('content').value;
            const prior = document.querySelector('input[name="prio"]:checked').value;
            const id = (new URLSearchParams(window.location.search)).get("id");
            fetch(`http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/todo/delete/${id}`, {
                method: "PATCH",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({
                    "id": id,
                    "title": title,
                    "content": content,
                    "prio": prior,
                }),
            }).then(() => {
                window.location.replace("http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/todo");
            })
        }
    </script>
    <div class="flex justify-center flex-col mt-8">
        <div class="mx-auto">
            <input class="border border-1 border-black block mt-4 pl-4 py-2 text-2xl" type="text" id="title"
                   name="title"
                   autocomplete="off" value="<?php echo $this->data['title']; ?>">
            <label class="mx-auto opacity-50">Title</label>
        </div>
        <div class="mx-auto">
            <input class="border border-1 border-black block mt-4 pl-4 py-2 text-2xl" id="content" type="text"
                   name="content"
                   autocomplete="off" value="<?php echo $this->data['content']; ?>">
            <label class="mx-auto opacity-50">Note</label>
        </div>
        <div class="flex flex-row mx-auto mt-4">
            <input class="border border-1 border-black block mt-4 mr-1" type="radio"
                   name="prio" <?php if ($this->data['prio'] == "High") echo "checked "; ?> value="High">
            <label class="mx-auto mr-4 mt-2 text-lg">High</label>
            <input class="border border-1 border-black block mt-4 mr-1" type="radio" name="prio"
                   <?php if ($this->data['prio'] == "Normal") echo "checked "; ?>value="Normal">
            <label class="mx-auto mr-4 mt-2 text-lg">Normal</label>
            <input class="border border-1 border-black block mt-4 mr-1" type="radio" name="prio"
                   <?php if ($this->data['prio'] == "Low") echo "checked "; ?>value="Low">
            <label class="mx-auto mr-4 mt-2 text-lg">Low</label>
        </div>

        <button class="mt-4 text-xl uppercase border border-2 border-black/40 w-fit p-2 mx-auto" id="button"
        ">
        Save
        </button>
    </div>
    <script>
        document.getElementById("button").addEventListener("click", function (event) {
            event.preventDefault();
            handleSubmit();
        })
    </script>

<?php
require_once("components/footer.php");

<?php
// 1. Define your 20 questions in an associative array
$questions = [
    1 => ["q" => "What does PHP stand for?", "options" => ["A" => "Private Home Page", "B" => "Hypertext Preprocessor", "C" => "Personal Hypertext Processor"], "answer" => "B"],
    2 => ["q" => "Which symbol is used to declare a variable in PHP?", "options" => ["A" => "$", "B" => "&", "C" => "!"], "answer" => "A"],
    3 => ["q" => "Which tag is used to wrap PHP code?", "options" => ["A" => "<script>", "B" => "<?php ?>", "C" => "<php>"], "answer" => "B"],
    4 => ["q" => "Which function is used to output text?", "options" => ["A" => "echo", "B" => "print_text", "C" => "display"], "answer" => "A"],
    5 => ["q" => "In PHP, array indices start at...", "options" => ["A" => "1", "B" => "-1", "C" => "0"], "answer" => "C"],
    6 => ["q" => "Which operator is used for concatenation?", "options" => ["A" => "+", "B" => ".", "C" => "&"], "answer" => "B"],
    7 => ["q" => "How do you write a single-line comment?", "options" => ["A" => "//", "B" => "/*", "C" => "#"], "answer" => "A"],
    8 => ["q" => "Which superglobal holds form data from a POST request?", "options" => ["A" => "\$_GET", "B" => "\$_SESSION", "C" => "\$_POST"], "answer" => "C"],
    9 => ["q" => "What is the default extension of a PHP file?", "options" => ["A" => ".html", "B" => ".php", "C" => ".xml"], "answer" => "B"],
    10 => ["q" => "Which function counts elements in an array?", "options" => ["A" => "count()", "B" => "length()", "C" => "sum()"], "answer" => "A"],
    11 => ["q" => "How do you end a PHP statement?", "options" => ["A" => ".", "B" => ";", "C" => ":"], "answer" => "B"],
    12 => ["q" => "Which function checks if a variable is set?", "options" => ["A" => "is_set()", "B" => "isset()", "C" => "check()"], "answer" => "B"],
    13 => ["q" => "A 'while' loop runs as long as...", "options" => ["A" => "Condition is true", "B" => "Condition is false", "C" => "Forever"], "answer" => "A"],
    14 => ["q" => "Which of these is a scalar type?", "options" => ["A" => "Array", "B" => "Integer", "C" => "Object"], "answer" => "B"],
    15 => ["q" => "Which function deletes a file?", "options" => ["A" => "delete()", "B" => "remove()", "C" => "unlink()"], "answer" => "C"],
    16 => ["q" => "How do you start a session?", "options" => ["A" => "session_start()", "B" => "begin_session()", "C" => "start()"], "answer" => "A"],
    17 => ["q" => "PHP is a ______-side scripting language.", "options" => ["A" => "Client", "B" => "Server", "C" => "Browser"], "answer" => "B"],
    18 => ["q" => "What does PDO stand for?", "options" => ["A" => "PHP Data Objects", "B" => "PHP Database Open", "C" => "Private Data Object"], "answer" => "A"],
    19 => ["q" => "Which function returns the length of a string?", "options" => ["A" => "strlen()", "B" => "strlength()", "C" => "length()"], "answer" => "A"],
    20 => ["q" => "Which operator is used for equality (value and type)?", "options" => ["A" => "==", "B" => "=", "C" => "==="], "answer" => "C"],
];

$score = 0;
$submitted = isset($_POST['submit']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Quiz - 20 Questions</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; max-width: 800px; margin: 20px auto; padding: 20px; background: #f4f4f4; }
        .question-box { background: #fff; padding: 15px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .result { background: #d4edda; color: #155724; padding: 20px; border-radius: 8px; font-size: 1.2em; text-align: center; }
        .correct { color: green; font-weight: bold; }
        .wrong { color: red; font-weight: bold; }
        button { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>

    <h1>General PHP Quiz</h1>

    <?php if ($submitted): ?>
        <?php
        foreach ($questions as $id => $data) {
            $user_answer = $_POST['q' . $id] ?? '';
            if ($user_answer === $data['answer']) {
                $score++;
            }
        }
        ?>
        <div class="result">
            <h2>Your Result</h2>
            <p>You scored <strong><?php echo $score; ?></strong> out of 20.</p>
            <a href="quiz.php">Try Again</a>
        </div>
    <?php endif; ?>

    <form method="post" action="">
        <?php foreach ($questions as $id => $data): ?>
            <div class="question-box">
                <p><strong><?php echo $id; ?>. <?php echo $data['q']; ?></strong></p>
                <?php foreach ($data['options'] as $key => $val): ?>
                    <label style="display: block;">
                        <input type="radio" name="q<?php echo $id; ?>" value="<?php echo $key; ?>" required 
                        <?php if($submitted) echo "disabled"; ?>>
                        <?php echo $key . ") " . $val; ?>
                    </label>
                <?php endforeach; ?>
                
                <?php if ($submitted): ?>
                    <p>
                        <?php 
                        $user_ans = $_POST['q' . $id] ?? 'None';
                        if ($user_ans === $data['answer']) {
                            echo "<span class='correct'>✓ Correct!</span>";
                        } else {
                            echo "<span class='wrong'>✗ Wrong. (Correct: " . $data['answer'] . ")</span>";
                        }
                        ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <?php if (!$submitted): ?>
            <button type="submit" name="submit">Finish Quiz</button>
        <?php endif; ?>
    </form>

</body>
</html>
<?php
abstract class AbstractPageTemplate
{
    protected abstract function header(); #AbstractPageTemplate 를 상속받은 클래스는 반드시 이 메소드를 구현해야함. (에러 발생.)
    protected abstract function article();
    protected abstract function footer();
 
    protected final function template()
    {
        $result = $this->header();
        $result .= $this->article();
        $result .= $this->footer();
        return $result;
    }

    public function render()
    {
        return $this->template();
    }
}
class TextPage extends AbstractPageTemplate
{
    protected function header()
    {
        return "PHP \n";
    }
    protected function article()
    {
        return "PHP: Hypertext Preprocessor \n";
    }
    protected function footer()
    {
        return "website is php.net \n";
    }
}

class HtmlPage extends AbstractPageTemplate
{
    protected function header()
    {
        return "<header>PHP</header>\n";
    }
    protected function article()
    {
        return "<article>PHP: Hypertext Preprocessor</article>\n";
    }
    protected function footer()
    {
        return "<footer>website is php.net</footer>\n";
    }

    public function render()
    {
        $result = '<html>';
        $result .= $this->template();
        return $result.'</html>';
    }
}
?>

<h1>text</h1>
<?php
    $text = new TextPage();
    echo $text->render();
?>
<h1>html</h1>
<?php
    $html = new HtmlPage();
    echo $html->render();
?>
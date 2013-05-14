<?PHP

namespace spouts\rss;

/**
 * Spout for fetching an rss article feed from arXiv.org
 *
 * @package    spouts
 * @subpackage rss
 * @copyright  Copyright (c) Tobias Zeising (http://www.aditu.de)
 * @license    GPLv3 (http://www.gnu.org/licenses/gpl-3.0.html)
 * @author     Tobias Zeising <tobias.zeising@aditu.de>
 */
class arxiv extends feed {

    /**
     * name of source
     *
     * @var string
     */
    public $name = 'arXiv feed';


    /**
     * description of this source type
     *
     * @var string
     */
    public $description = 'RSS Feed with author prepended, best suited for arXiv.org';


    /**
     * returns the current title as string
     *
     * @return string title
     */
    public function getTitle() {
        if($this->items!==false && $this->valid()) {
            $authors = @current($this->items)->get_authors();
            if (count($authors) > 0) {
                return $authors[0]->get_name() . ' &ndash; ' . @current($this->items)->get_title();
            }
            return @current($this->items)->get_title();
        }
        return false;
    }


}

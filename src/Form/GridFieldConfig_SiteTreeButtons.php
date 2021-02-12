<?php

namespace Restruct\GridFieldSiteTreeButtons {

    use SilverStripe\Forms\GridField\GridFieldConfig;
    use SilverStripe\Forms\GridField\GridFieldDataColumns;
    use SilverStripe\Forms\GridField\GridFieldFilterHeader;
    use SilverStripe\Forms\GridField\GridFieldPaginator;
    use SilverStripe\Forms\GridField\GridFieldSortableHeader;
    use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
    use SilverStripe\Lumberjack\Forms\GridFieldSiteTreeState;

    /**
     * GridField config for managing a SiteTree items
     *
     * @author Michael van Schaik <mic@restruct.nl>
     */
    class GridFieldConfig_SiteTreeButtons extends GridFieldConfig
    {

        public function __construct($itemsPerPage = null)
        {
            parent::__construct();

            $this->addComponent(new GridFieldToolbarHeader());
            $this->addComponent(new GridFieldAddNewSiteTreeItemButton('toolbar-header-right')); // or 'buttons-before-left'
            $this->addComponent(new GridFieldSortableHeader());
            $this->addComponent(new GridFieldFilterHeader());
            $this->addComponent($dataColumns = new GridFieldDataColumns());
            $this->addComponent($paging = new GridFieldPaginator($itemsPerPage));
            $paging->setThrowExceptionOnBadDataType(true);
            $this->addComponent(new GridFieldEditSiteTreeItemButton());
            $this->addComponent(new GridFieldSiteTreeState());

//		$this->addComponent(new GridFieldButtonRow('before'));
//		$this->addComponent(new GridFieldToolbarHeader());
//		$this->addComponent(new GridFieldDataColumns());
//		$this->addComponent(new GridFieldPageCount('toolbar-header-right'));
        }
    }
}
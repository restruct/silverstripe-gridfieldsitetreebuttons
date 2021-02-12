<?php

namespace Restruct\GridFieldSiteTreeButtons {

    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldEditButton;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\View\ArrayData;

    /**
     * Includes default SiteTree edit link instead of GridFieldDetailForm link
     *
     * @author Michael van Schaik <mic@restruct.nl>
     */
    class GridFieldEditSiteTreeItemButton extends GridFieldEditButton
    {

        /**
         * @param GridField  $gridField
         * @param DataObject $record
         * @param string     $columnName
         *
         * @return string - the HTML for the column
         */
        public function getColumnContent($gridField, $record, $columnName)
        {
            if ( !$record->canEdit() ) {
                return;
            }
            $data = new ArrayData([
                'Link' => $record->CMSEditLink(),
            ]);

            return $data->renderWith(GridFieldEditButton::class);
        }

    }
}
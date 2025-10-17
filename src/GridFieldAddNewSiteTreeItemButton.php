<?php

namespace Restruct\GridFieldSiteTreeButtons {

    use SilverStripe\Control\Controller;
    use SilverStripe\Control\Director;
    use SilverStripe\Forms\GridField\GridFieldAddNewButton;
    use SilverStripe\View\ArrayData;

    /**
     * This component provides a button for opening the default add new form for SiteTree items (Pages) in a Gridfield
     *
     * @author Michael van Schaik <mic@restruct.nl>
     */
    class GridFieldAddNewSiteTreeItemButton extends GridFieldAddNewButton
    {

        public function getHTMLFragments($gridField)
        {

            if ( !$this->buttonName ) {
                // provide a default button name, can be changed by calling {@link setButtonName()} on this component
                $objectName = singleton($gridField->getModelClass())->i18n_singular_name();
                $this->buttonName = _t('GridField.Add', 'Add {name}', [ 'name' => $objectName ]);
            }

            $ParentID = Controller::curr()->getRequest()->param('ID');
            $data = ArrayData::create([
                'NewLink'    => Controller::join_links(Director::baseURL(), '/admin/pages/add/AddForm/',
                    '?action_doAdd=1&ParentID=' . $ParentID . '&PageType=' .
                    $gridField->getModelClass() . '&SecurityID=' . $gridField->getForm()->getSecurityToken()->getValue()),
                'ButtonName' => $this->buttonName,
            ]);

            return [
                $this->targetFragment => $data->renderWith('GridFieldAddNewbutton'),
            ];
        }

    }
}

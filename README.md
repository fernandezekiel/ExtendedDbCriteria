ExtendedDbCriteria
==================

ExtendedDbCriteria allows us to create nested clauses while maintaining the Object oriented way of generating conditions


Usage example


        $criteria = new ExtendedDbCriteria;
        $criteria->compare('branch_id',$branch_id);
        $criteria->compare('classification',$classification) ;

        $criteria   ->beginSubCriteria()
                    ->compare('item_code', $_GET['item_code'], TRUE)
                    ->compare('description', $_GET['item_code'], TRUE, 'OR')
                        ->beginSubCriteria('OR')
                        ->compare('another', $_GET['another'], TRUE, 'OR')
                        ->endSubCriteria()
                    ->endSubCriteria();
        
        $count = ItemHeader::model()->findAll($criteria);

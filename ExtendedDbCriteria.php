<?php

/**
 * 
 * @author Ezekiel Fernandez <ezekiel_p_fernandez@yahoo.com>
 * 
 * allows the user to created nested criterias on the fly
 * 

 */
class ExtendedDbCriteria extends CDbCriteria {

    /**
     * @var ExtendedDbCriteria contains the parent of the subcriteria
     */
    public $parentCriteria;

    /**
     * @var string contains the operators used by {@link ExtendedDbCriteria::endSubCriteria} 
     */
    public $parentCriteriaOperator;

    /**
     * @param string $operator operator
     * @return ExtendedDbCriteria
     */
    public function beginSubCriteria($operator = 'AND') {
        $childCriteria = new self;
        $childCriteria->parentCriteria = $this;
        $childCriteria->parentCriteriaOperator = $operator;
        return $childCriteria;
    }

    /**
     * 
     * @return ExtendedDbCriteria
     */
    public function endSubCriteria() {
        $this->parentCriteria->mergeWith($this, $this->parentCriteriaOperator);
        return $this->parentCriteria;
    }
}
?>
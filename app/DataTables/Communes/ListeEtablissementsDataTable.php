<?php

namespace App\DataTables\Communes;

use App\Models\Etablissement;
use Yajra\DataTables\Services\DataTable;

class ListeEtablissementsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function($query){
                 return '<button type="button" class="edit-modal btn btn-info" data-toggle="modal" data-target="#editModal"  data-info="'.$query->idetablissement.','.$query->nom.','.$query->abbr.'">
                  <span class="fa fa-edit"></span>
                </button>'
                .
                '<a  href="'.route('commune.crud_etablissements.destroy',$query->idetablissement).'" class="btn btn-danger">
                  <i class=" fas fa-trash-alt"></i>
                </button>'
               
                ;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Etablissement $model)
    {
        return $model::getEtablissements();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '150px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // 'idetablissement',
            'nom',
            'abbr'=>[
                        'name'=>'abbr',
                        'data' => 'abbr',
                        'title' => 'Abbréviation',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
            'slug'=>[
                        'name'=>'slug',
                        'data' => 'slug',
                        'title' => 'Slug',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
            'pseudo'=>[
                        'name'=>'pseudo',
                        'data' => 'pseudo',
                        'title' => 'Administrateur',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
        ];
    }

    protected function getBuilderParameters(){
        return [
            
            'buttons' => [],
            'order' => [[1,'Asc']]
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Communes/ListeEtablissements_' . date('YmdHis');
    }
}

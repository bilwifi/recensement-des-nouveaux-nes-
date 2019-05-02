<?php

namespace App\DataTables\Etablissements;

use App\Models\Declaration;
use Yajra\DataTables\Services\DataTable;

class ListeNotificationsDataTable extends DataTable
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
                return '<a href="'.route('etablissement.edit_declaration',[$this->etablissement_slug,$query->iddeclaration]).'" class="delete-modal btn btn-primary">Edit</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Declaration $model)
    {
        return $model::getDeclarationByEtablissement($this->idetablissement);
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
                    ->addAction(['width' => '80px'])
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
            'iddeclaration',
            'mere.nom',
            'enfant.prenom',
            'enfant.sexe',
            'enfant.dateNaiss',
            'declarant.nom',
            'statut'
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
        return 'Etablissements/ListeNotifications_' . date('YmdHis');
    }
}

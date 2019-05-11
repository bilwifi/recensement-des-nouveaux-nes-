<?php

namespace App\DataTables\Communes;

use App\Models\Agents_commune;
use Yajra\DataTables\Services\DataTable;

class ListeUtilisateursDataTable extends DataTable
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
                return '<button type="button" class="edit-modal btn btn-info" data-toggle="modal" data-target="#editModal"  data-info="'.$query->idagents_commune.','.$query->profil.'">
                  <span class="fa fa-edit"></span> Edit
                </button>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Agents_commune $model)
    {
        return $model::getUsersByCommune($this->idcommune);
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
    protected function getBuilderParameters(){
        return [
            
            'buttons' => [],
            'order' => [[1,'Asc']]
        ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nom',
            'prenom',
            'pseudo',
            'profil',
           
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Communes/ListeUtilisateurs_' . date('YmdHis');
    }
}

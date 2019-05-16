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
                $disable ='test';
                if ($this->user->profil != 'admin' && $query->iddeclarant != $this->user->idpersonne) {
                    $disable = 'disabled';
                }


                return 
                '<a href="'.route('etablissement.send_declaration',[$this->etablissement_slug,$query->iddeclaration]).'" class="delete-modal btn btn-success '.$disable.'"><i class=" fas fa-share-square"></i></a>'
                
                .
                '<a href="'.route('etablissement.edit_declaration',[$this->etablissement_slug,$query->iddeclaration]).'" class="delete-modal btn btn-primary '.$disable.'"><i class="fas fa-edit"></i></a>'
                .
                '<a href="'.route('etablissement.delete_declaration',[$this->etablissement_slug,$query->iddeclaration]).'" class="delete-modal btn btn-danger '.$disable.'"><i class=" fas fa-trash-alt"></i></a>'
                ;
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
            // 'iddeclaration'=>[
            //             'name'=>'lib',
            //             'data' => 'lib',
            //             'title' => 'Profil',
            //             'searchable' => false,
            //             'orderable' => false,
            //             // 'render' => 'pap',
            //             'exportable' => true,
            //             'printable' => true,
            //         ],
            'mere.nom'=>[
                        'name'=>'mere.nom',
                        'data' => 'mere.nom',
                        'title' => 'Nom de la mère',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
            'enfant.prenom'=>[
                        'name'=>'enfant.prenom',
                        'data' => 'enfant.prenom',
                        'title' => 'Prénom de l\'enfant',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
            // 'enfant.sexe'=>[
            //             'name'=>'enfant.sexe',
            //             'data' => 'enfant.sexe',
            //             'title' => 'Sexe',
            //             'searchable' => false,
            //             'orderable' => false,
            //             // 'render' => 'pap',
            //             'exportable' => true,
            //             'printable' => true,
            //         ],
            'enfant.dateNaiss'=>[
                        'name'=>'enfant.dateNaiss',
                        'data' => 'enfant.dateNaiss',
                        'title' => 'Date de naissance',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
            'declarant.nom'=>[
                        'name'=>'declarant.nom',
                        'data' => 'declarant.nom',
                        'title' => 'Declarant',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
            'created_at'=>[
                        'name'=>'created_at',
                        'data' => 'created_at',
                        'title' => 'Date de création',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
             // 'statut'=>[
             //            'name'=>'statut',
             //            'data' => 'statut',
             //            'title' => 'Etat',
             //            'searchable' => false,
             //            'orderable' => false,
             //            // 'render' => 'pap',
             //            'exportable' => true,
             //            'printable' => true,
             //        ],
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

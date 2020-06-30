import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
/* USER PAGES */
import { DashboardComponent } from 'app/pages/dashboard/dashboard.component';
import { ListaComponent } from 'app/pages/lista/lista.component';
import { FormularioComponent } from 'app/pages/formulario/formulario.component';
const routes: Routes = [
    { path: '', component: ListaComponent, children: [
        { path: 'formulario',component: FormularioComponent  },
      ],
    }
];
@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PagesRoutingModule { }

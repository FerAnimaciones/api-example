import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
/* MODULES */
import { PagesRoutingModule } from './pages-routing.module';
import { ReactiveFormsModule } from '@angular/forms';
/* USER PAGES */
import { DashboardComponent } from 'app/pages/dashboard/dashboard.component';
import { ListaComponent } from 'app/pages/lista/lista.component';
import { FormularioComponent } from 'app/pages/formulario/formulario.component';

@NgModule({
  declarations: [
    //DashboardComponent,
    DashboardComponent,
    ListaComponent,
    FormularioComponent
  ],
  imports: [
    CommonModule,
    PagesRoutingModule,
    ReactiveFormsModule,
  ],
  entryComponents: [

  ],
})
export class PagesModule { }

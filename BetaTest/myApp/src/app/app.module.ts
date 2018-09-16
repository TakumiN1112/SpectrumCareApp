import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { EventPage } from '../pages/event/event';
import { SettingPage } from '../pages/setting/setting';
import { SopPage } from '../pages/sop/sop';
import { WelcomePage } from '../pages/welcome/welcome';
import { PipesModule } from '../pipes/pipes.module';


@NgModule({
  declarations: [
    MyApp,
    HomePage,
	EventPage,
	SettingPage,
	SopPage,
  WelcomePage
  ],
  imports: [
    BrowserModule,
	PipesModule,
    //IonicModule.forRoot(MyApp)
	IonicModule.forRoot(MyApp,{
		tabshideOnSubPages:'true'
	})
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
	EventPage,
	SettingPage,
	SopPage,
  WelcomePage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}

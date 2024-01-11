<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\OrderResource\Pages;
    use App\Filament\Resources\OrderResource\RelationManagers;
    use App\Models\OrderItem;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;

    class OrderResource extends Resource {
        protected static ?string $model = OrderItem::class;
        protected static ?string $label = "Orders";

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form ( Form $form ): Form {
            return $form -> schema ( [

                ] );
        }

        /**
         * @throws \Exception
         */
        public static function table ( Table $table ): Table {
            return $table -> columns ( [ Tables\Columns\TextColumn ::make ( "order.user.name" ) -> searchable (), Tables\Columns\TextColumn ::make ( "product.title" ) -> searchable (), Tables\Columns\TextColumn ::make ( "quantity" ), Tables\Columns\TextColumn ::make ( "created_at" ) -> label ( "Order date" ) -> date (), Tables\Columns\TextColumn ::make ( "order.status" ) -> label ( "Status" ) -> searchable (),

                ] )
                -> filters ( [ Tables\Filters\SelectFilter ::make ( "order.status" ) ] )
                -> actions ( [
                    //                Tables\Actions\EditAction::make(),

                     ] ) -> bulkActions ( [ Tables\Actions\BulkActionGroup ::make ( [ Tables\Actions\DeleteBulkAction ::make (), ] ), ] );
        }

        public static function getRelations (): array {
            return [//
            ];
        }

        public static function getPages (): array {
            return [ 'index' => Pages\ListOrders ::route ( '/' ), 'create' => Pages\CreateOrder ::route ( '/create' ), 'edit' => Pages\EditOrder ::route ( '/{record}/edit' ), ];
        }
    }

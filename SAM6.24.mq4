int position = OrdersTotal();
 
  double sma1 =iMA(NULL,60,6,0,MODE_SMA,PRICE_CLOSE,1);
  double sma2 =iMA(NULL,60,24,0,MODE_SMA,PRICE_CLOSE,1);
  double sma3 =iMA(NULL,60,6,0,MODE_SMA,PRICE_CLOSE,2);
  double sma4 =iMA(NULL,60,24,0,MODE_SMA,PRICE_CLOSE,2);
 
  if(position < 1 && TimeMinute(TimeCurrent()) == 0)
 {
 if(sma4 > sma3 && sma1 > sma2)
 {
  OrderSend(NULL,OP_BUY,0.1,Ask,5,Bid - 0.15,Bid + 0.15,"L",123456,0,Red);
 }

 if(sma3 > sma4 && sma2 > sma1)
 {
  OrderSend(NULL,OP_SELL,0.1,Bid,5,Bid + 0.15,Bid - 0.15,"S",123456,0,Blue);
 
 }
 }